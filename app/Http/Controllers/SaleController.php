<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\CashHand;
use App\Repositories\SaleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\AddStock;
use DB;
use Session;
use PDF;
use Mail;
use App\Models\User;
use Carbon\Carbon;

class SaleController extends AppBaseController
{
    /** @var  SaleRepository */
    private $saleRepository;

    public function __construct(SaleRepository $saleRepo)
    {
        $this->saleRepository = $saleRepo;
        $this->middleware('permission:sale-list|sale-create|sale-edit|sale-delete', ['only' => ['index','show']]);
        $this->middleware('permission:sale-create', ['only' => ['create','store']]);
        $this->middleware('permission:sale-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sale-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Sale.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sales = Sale::with('products')
                ->orderBy("id", "desc")->get();
                return view('sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new Sale.
     *
     * @return Response
     */
    public function create()
    {

        $product = Product::all();
        $customer = Customer::all();
        return view('sales.create',compact('product','customer'));
    }

    /**
     * Store a newly created Sale in storage.
     *
     * @param CreateSaleRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $sale = new Sale();
        $sale->customer_id = $request->customer_id;
        $sale->sales_date =  Carbon::createFromFormat('d-m-Y', $request->sales_date)->format('Y-m-d');

        $timestamp = strtotime($request->sales_date);
        $year = date('Y', $timestamp);
        $sale_id = Sale::whereYear('sales_date',$year)->max('sales_id');

        if ($sale_id == NULL){
            $saleID = 100;
        }
        else{
            $saleID = $sale_id + 1;

        }
        $sale->sales_id = $saleID;
        $sale->sub_total = $request->sub_total;
        $sale->vat = $request->vat;
        $sale->vat_amount = $request->vat_amount;
        $sale->total_amount = $request->total_amount;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $payment_type = $request['payment_type'];
        $request['payment_type']=implode(',', $payment_type);
        $sale->payment_type = $request['payment_type'];
        $sale->payment_status = $request->payment_status;
        $sale->order_status = 1;
        $sale->po = $request->po;
        $billID = $year.'-'.$saleID;
        $sale->bill_id = $billID;
        $sale->save();
         $tDate = date('Y-m-d');
         $cashHand = CashHand::where('date',$tDate)->first();

         if($cashHand == NULL)
         {
             $cashHand = new CashHand();
             $cashHand->date = date('Y-m-d');
             $cashHand->amount = $request->paid;
             $cashHand->save();
         }
         else
         {
          $totalcashHand = ($cashHand->amount)+($request->paid);
          CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);
         }
         $products = $request->input('product_id', []);
         $quantities = $request->input('qty', []);
         $serials =  $request->input('serial', []);
         $rates = $request->input('price', []);
         $discounts= $request->input('dis', []);
         $totals= $request->input('amount', []);

         for ($product=0; $product < count($products); $product++) {
             if ($products[$product] != '') {
                $salePQ =  Product::all()
                    ->where('id', $products[$product])->first();
                $saleP = $salePQ->qty;

                DB::table('products')
                    ->where('id', $products[$product])
                    ->decrement('qty', $quantities[$product]);

                $saleQ =  Product::all()
                    ->where('id', $products[$product])->first();
                    $quantity= $saleQ->qty;
                $productStock =  new AddStock;
                $productStock->product_id = $products[$product];
                $productStock->sale_id = $sale->id;
                $productStock->previous_qty = $saleP;
                $productStock->qty = $quantities[$product];
                $productStock->current_qty=$quantity;
                $productStock->status= "Sales Entry";
                $productStock->save();
               // dd($quantity);
                $sale->products()->attach($products[$product],['quantity' => $quantities[$product],'c_quantity'=>$quantity, 'serial'=>$serials[$product],'rate'=>$rates[$product],
                                   'discount'=>$discounts[$product],'total'=>$totals[$product]]);
             }
         }
              $fileName ='Invoice#' .$billID.'.pdf';
              $users = User::where('status', 1)->get();
             foreach($users as $users){
              $mail = $users->email;
              $name = $users->name;
              $data["email"]=$mail;
              $data["client_name"]=$name;
              $data["subject"]='New Sales';
              $data["attachment"] = $fileName;
              $saleData = Sale::with('products')
                                ->where('id', $sale->id)
                                ->first();
        $pdf = PDF::loadView('sales.pdf',compact('saleData'));
        $filename= $saleData->id;
        try{
            Mail::send('sales.body', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(),  $data["attachment"]);
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
     }
        if (Mail::failures()) {
            Session::flash('error','Couldnot sent the Email.');
            return redirect('sales/'.$sale->id)->with('message','invoice created Successfully');

        }else{

            Session::flash('success','Email has been sent.');
            return redirect('sales/'.$sale->id)->with('message','invoice created Successfully');
        }

    }

    /**
     * Display the specified Sale.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $sale = Sale::with('products')->findorfail($id);

        return view('sales.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified Sale.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customer = Customer::all();
        $product = Product::orderBy('id', 'DESC')->get();
        $sale = Sale::with('products')->findorfail($id);
        $selected = $sale->pluck('payment_type')->toArray();
        return view('sales.edit', compact('customer','product','sale','selected'));
    }

    /**
     * Update the specified Sale in storage.
     *
     * @param int $id
     * @param UpdateSaleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSaleRequest $request)
    {

        $sale = Sale::with('products')->findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;

        $cashH = $amount-($sale->paid);

         $sale->customer_id = $request->customer_id;
        $sale->sales_date =  Carbon::createFromFormat('d-m-Y', $request->sales_date)->format('Y-m-d');
        $sale->sub_total = $request->sub_total;
        $sale->vat = $request->vat;
        $sale->vat_amount = $request->vat_amount;
        $sale->total_amount = $request->total_amount;
        $sale->paid = $request->paid;
        $sale->due = $request->due;
        $payment_type = $request['payment_type'];
        $request['payment_type']=implode(',', $payment_type);
        $sale->payment_type = $request['payment_type'];
        $sale->payment_status = $request->payment_status;
        $sale->order_status = 1;
        $sale->po = $request->po;

        $sale->save();

        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();

        if($cashHand == NULL)
        {
            $cashHand = new CashHand();
            $cashHand->date = date('Y-m-d');
            $cashHand->amount = $request->paid;
            $cashHand->save();
        }
        else
        {
            $totalcashHand = ($cashH)+($request->paid);
            CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);
        }
        $q = DB::table('product_sale')
                    ->where('sale_id', $id)->get();


        //   dd($q);
          foreach($q as $p){
            //   dd(DB::table('products')->find($p->product_id));
              $qty =DB::table('products')->where('id',$p->product_id)->increment('qty', $p->quantity);


          }
        $sale->products()->detach();
        AddStock::where('sale_id', $id)->delete();

        $products = $request->input('product_id', []);
        $quantities = $request->input('qty', []);
        $serials =  $request->input('serial', []);
        $rates = $request->input('price', []);
        $discounts= $request->input('dis', []);
        $totals= $request->input('amount', []);
        for ($product=0; $product < count($products); $product++) {
          if ($products[$product] != '') {
            $salePQ =  Product::all()
            ->where('id', $products[$product])->first();
            $saleP = $salePQ->qty;

        DB::table('products')
            ->where('id', $products[$product])
            ->decrement('qty', $quantities[$product]);

        $saleQ =  Product::all()
            ->where('id', $products[$product])->first();
            $quantity= $saleQ->qty;
            $productStock =  new AddStock;
        $productStock->product_id = $products[$product];
        $productStock->sale_id = $sale->id;
        $productStock->previous_qty = $saleP;
        $productStock->qty = $quantities[$product];
        $productStock->current_qty=$quantity;
        $productStock->status= "Sales Entry";
        $productStock->save();
        $sale->products()->attach($products[$product],['quantity' => $quantities[$product],'c_quantity'=>$quantity,'serial'=> $serials[$product],'rate'=> $rates[$product],
                                    'discount'=> $discounts[$product],'total'=> $totals[$product]]);

          }
        }

    return redirect('sales/'.$sale->id)->with('message','invoice updated Successfully');


}

    /**
     * Remove the specified Sale from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;

        $cashH = $amount-($sale->paid);

        $q = DB::table('product_sale')
        ->where('sale_id', $id)->get();
            foreach($q as $p){

            $qty =DB::table('products')->where('id',$p->product_id)->increment('qty', $p->quantity);


            }
            AddStock::where('sale_id', $id)->delete();
        $sale->order_status = 0;
        $sale->save();
        $tDate = date('Y-m-d');
        CashHand::where('date',$tDate)->update(['amount'=>$cashH]);

        Flash::success('Sale deleted successfully.');

        return redirect(route('sales.index'));
    }

    public function getProduct(Request $request){

            $query = $request->get('term','');
            $products=\DB::table('products');
            if($request->type=='productname'){
                $products->select('id','name','selling_price')
                         ->where('name','LIKE','%'.$query.'%')
                         ->where('deleted_at',NULL);
            }

            $products=$products->get();
            $data=array();
            foreach ($products as $product) {
                    $data[]=array('name'=>$product->name,'sortname'=>$product->selling_price);
            }
            if(count($data))
                return $data;
            else
                return ['name'=>'','sortname'=>''];
}

public function prnpriview($id)
      {
        $sale = Sale::with('products')->findorfail($id);
        $count = \DB::table('product_sale')
                 ->where('sale_id', $id)
                 ->count();
           // dd($count);
         return view('sales.invoice2',compact('sale','count'));
      }

      public function export_pdf($id)
      {
        // Fetch all customers from database
        $sale = Sale::with('products')->findorfail($id);
        $count = \DB::table('product_sale')
                 ->where('sale_id', $id)
                 ->count();

       $pdf = PDF::loadView('sales.pdf1',compact('sale','count'));
        $pdf->save(storage_path().'_filename.pdf');
       return $pdf->stream('invoice.pdf');
      }

      public function mail($id)
      {
        $saleData = Sale::with('products')->findorfail($id);
        //$customerID = Customer::where('id', $sale1->customer_id)->first();
        $email= $saleData->customer->email;
        $name =$saleData->customer->name;

        $bill = $saleData->bill_id;

        $fileName ='Invoice#' .$bill.'.pdf';


        //  dd($mail);

          $data["email"]=$email;
          $data["client_name"]=$name;
          $data["subject"]='Due Payment';
          $data["attachment"] = $fileName;

        //dd($email);


          $pdf = PDF::loadView('sales.pdf',compact('saleData'));
         // $filename= $sale1->id;
         try{
            Mail::send('sales.due', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), $data["attachment"]);
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            Session::flash('error','Couldnot sent the Email.');
            return redirect()->back();

        }else{

            Session::flash('success','Email has been sent.');
            return redirect()->back();
        }

      }

      public function prnprichalan($id)
      {
        $sale = Sale::with('products')->findorfail($id);
        $count = \DB::table('product_sale')
                 ->where('sale_id', $id)
                 ->count();
           // dd($count);
         return view('sales.chalan',compact('sale','count'));
      }


      public function customermail($id)
      {
        $saleData = Sale::with('products')->findorfail($id);
        //$customerID = Customer::where('id', $sale1->customer_id)->first();
        $email= $saleData->customer->email;
        $name =$saleData->customer->name;

        $bill = $saleData->bill_id;

        $fileName ='Invoice#' .$bill.'.pdf';



          $data["email"]=$email;
          $data["client_name"]=$name;
          $data["subject"]='Invoice from Symbex International';
          $data["attachment"] = $fileName;
        //dd($email);


          $pdf = PDF::loadView('sales.pdf',compact('saleData'));
         // $filename= $sale1->id;
         try{
            Mail::send('sales.sale', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), $data["attachment"]);
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            Session::flash('error','Couldnot sent the Email.');
            return redirect()->back();

        }else{

            Session::flash('success','Email has been sent.');
            return redirect()->back();
        }

      }

      public function search(Request $request)
    {
    	$products = Product::where('product', 'LIKE', '%'.$request->input('term', '').'%')
        ->get(['id', 'product as text']);
        return ['results' => $products];
    }



     }



