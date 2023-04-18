<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Repositories\QuotationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use Response;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\quotation;
use App\Models\SaleItem;
use DB;
use Session;
use PDF;
use Mail;
use App\User;
use Carbon\Carbon;

class QuotationController extends AppBaseController
{
    /** @var  QuotationRepository */
    private $quotationRepository;

    public function __construct(QuotationRepository $quotationRepo)
    {
        $this->quotationRepository = $quotationRepo;
    }

    /**
     * Display a listing of the Quotation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $quotation = Quotation::with('products')
                    ->orderBy("id", "desc")
                    ->get();
        return view('quotations.index',compact('quotation'));
    }

    /**
     * Show the form for creating a new Quotation.
     *
     * @return Response
     */
    public function create()
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('quotations.create',compact('product','customer'));
    }

    /**
     * Store a newly created Quotation in storage.
     *
     * @param CreateQuotationRequest $request
     *
     * @return Response
     */
    public function store(CreateQuotationRequest $request)
    {
        $quotation = new quotation();

        $quotation->customer_id = $request->customer_id;
       $quotation->qut_date =  Carbon::createFromFormat('d-m-Y', $request->qut_date)->format('Y-m-d');

        $quotation->sub_total = $request->sub_total;
        $quotation->tax = $request->tax;
        $quotation->tax_amount = $request->tax_amount;
        $quotation->total_amount = $request->total_amount;
        $quotation->payment = $request->payment;
        $quotation->delivery_time = $request->delivery_time;

        $quotation->qut_status = 1;
        $quotation->payment_reference = $request->payment_reference;

        $quotation->save();



         $products = $request->input('product_id', []);

         $quantities = $request->input('qty', []);

         $rates = $request->input('price', []);

         $discounts= $request->input('dis', []);

         $totals= $request->input('amount', []);
       //  dd($totals);
         for ($product=0; $product < count($products); $product++) {
             if ($products[$product] != '') {
                $quotation->products()->attach($products[$product],['quantity' => $quantities[$product],'rate'=>$rates[$product],
                                   'discount'=>$discounts[$product],'total'=>$totals[$product]]);


             }
         }
             return redirect('quotations/'.$quotation->id)->with('message','Quotation created Successfully');
        }

       /**
     * Display the specified Quotation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quotation = Quotation::with('products')->findorfail($id);
       // dd($quotation);
        return view('quotations.show',compact('quotation'));
    }

    /**
     * Show the form for editing the specified Quotation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customer = Customer::all();
        $product = Product::orderBy('id', 'DESC')->get();
        $quotation = Quotation::with('products')->findorfail($id);

      //  $selected = $sale->pluck('payment_type')->toArray();
       // dd($sale);
        return view('quotations.edit', compact('customer','product','quotation'));
    }

    /**
     * Update the specified Quotation in storage.
     *
     * @param int $id
     * @param UpdateQuotationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuotationRequest $request)
    {
        $quotation = Quotation::with('products')->findorfail($id);
        $quotation->customer_id = $request->customer_id;
       $quotation->qut_date =  Carbon::createFromFormat('d-m-Y', $request->qut_date)->format('Y-m-d');
        $quotation->sub_total = $request->sub_total;
        $quotation->tax = $request->tax;
        $quotation->tax_amount = $request->tax_amount;
        $quotation->total_amount = $request->total_amount;
        $quotation->payment = $request->payment;
        $quotation->delivery_time = $request->delivery_time;

        $quotation->qut_status = 1;
        $quotation->payment_reference = $request->payment_reference;


        $quotation->save();
        $quotation->products()->detach();



         $products = $request->input('product_id', []);
         $quantities = $request->input('qty', []);
         $rates = $request->input('price', []);
         $discounts= $request->input('dis', []);
         $totals= $request->input('amount', []);
         for ($product=0; $product < count($products); $product++) {
             if ($products[$product] != '') {
                $quotation->products()->attach($products[$product],['quantity' => $quantities[$product],'rate'=>$rates[$product],
                                   'discount'=>$discounts[$product],'total'=>$totals[$product]]);


             }
            }
             return redirect('quotations/'.$quotation->id)->with('message','Quotation created Successfully');


    }

    /**
     * Remove the specified Quotation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quotation = $this->quotationRepository->find($id);

        if (empty($quotation)) {
            Flash::error('Quotation not found');

            return redirect(route('quotations.index'));
        }

        $this->quotationRepository->delete($id);

        Flash::success('Quotation deleted successfully.');

        return redirect(route('quotations.index'));
    }

    public function prnpriview($id)
      {
        $quotation = Quotation::with('products')->findorfail($id);


        return view('quotations.test',compact('quotation'));
      }

      public function export_pdf($id)
      {
        // Fetch all customers from database
        $quotation = Quotation::with('products')->findorfail($id);
        $mpdf = new Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML(\View::make('quotations.pdf',compact('quotation'))->with('data')->render());
        $pdf_path = public_path() . '/invoice/.pdf';
        $mpdf->Output($pdf_path, 'D');



        // Send data to the view using loadView function of PDF facade
     //   $pdf = PDF::loadView('sales.pdf',compact('sale','saleItem','product'));
        // If you want to store the generated pdf to the server then you can use the store function
        //$pdf->save(storage_path().'_filename.pdf');
        // Finally, you can download the file using download function
     //   return $pdf->stream('invoice.pdf');
      }

      public function mail($id)
      {
        $quotation = Quotation::with('products')->findorfail($id);
        //$customerID = Customer::where('id', $sale1->customer_id)->first();
        $email= $quotation->customer->email;
        $name =$quotation->customer->name;

         // dd($email);

          $data["email"]=$email;
          $data["client_name"]=$name;
          $data["subject"]='Quotation';
        //dd($email);


          $pdf = PDF::loadView('quotations.pdf',compact('quotation'));
         // $filename= $sale1->id;
         try{
            Mail::send('quotations.mail', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "Quotation.pdf");
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


}
