<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Sale;
use App\Models\Product;
use App\Models\LCDetail;
use File;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reports.index');
    }

    public function product()
    {
        $products = Product::all();
        return view('reports.product',compact('products'));
    }

    public function stock()
    {       
        $product = Product::all();
        $amount = Product::select(DB::raw('sum(qty * selling_price) as total'))->first();
        $total = $amount->total;
        $pdf = PDF::loadView('reports.stock',compact('product','total'));
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->stream('stock.pdf');
    }

    
    public function displayReport(Request $request)
    {       
        $fromDate = $request->input('start_date');
        $toDate = $request->input('end_date');

        $sale = Sale::with('products')
                    ->whereBetween('sales_date', [$fromDate, $toDate])
                    ->where('order_status', 1)
                    ->get();
        $amount = Sale::select(DB::raw('sum(total_amount) as total'))
                            ->whereBetween('sales_date', [$fromDate, $toDate])
                            ->where('order_status', 1)
                             ->first();
                            
         $total = $amount->total;
         $pdf = PDF::loadView('reports.report',compact('sale','fromDate','toDate','total'));
         $pdf->save(storage_path().'_filename.pdf');
         return $pdf->stream('report.pdf');

    }

    public function displayProductReport(Request $request)
    {   
        
        $product = $request->product_id;    
        $fromDate = $request->input('start_date');
        $toDate = $request->input('end_date');
        $productName = Product::findOrFail($product);
        $name = $productName->product;
        $sale = DB::table('product_sale')->select(
            'sales.*',
            'products.*',
            'customers.*',
            'product_sale.*'             

        )
        ->join('sales','sales.id', '=', 'product_sale.sale_id')
        ->join('products','products.id', '=', 'product_sale.product_id')
        ->join('customers','customers.id', '=', 'sales.customer_id')
        ->Where('products.id' , $product)
        ->whereBetween('sales.sales_date', [$fromDate, $toDate])                    
        ->where('sales.order_status', 1)  
        ->get();

         $quantity = $sale->sum('quantity');
         $total = $sale->sum('total');
         $pdf = PDF::loadView('reports.productreport',compact('sale','fromDate','toDate','total','name','quantity'));
         $pdf->save(storage_path().'_filename.pdf');
         return $pdf->stream('report.pdf');

    }

    public function monthlyStock(Request $request)
    {       
        
        $path = public_path('product_catalog');
         $files = File::allFiles($path);
      
        return view('reports.table',compact('files'));
                   
    }


    public function reportLC(Request $request)
    {       
        return view('l_c_details.lc');

    }

    public function displayLCReport(Request $request)
    {   
        
       
        $fromDate = $request->input('start_date');
        $toDate = $request->input('end_date');

      //  dd($fromDate,$toDate);

      $lcDetail = LCDetail::whereBetween('date', [$fromDate, $toDate])->get();
      //dd($lcDetail);

     // $id = $lcDetail->id;

      $fileName =  $fromDate.'to' .$toDate.'.pdf';     
      

      
     
      $pdf = PDF::loadView('l_c_details.reportAll',compact('lcDetail','fromDate','toDate'))->setPaper('a4', 'landscape');
      return $pdf->stream($fileName);


           }

   
}
