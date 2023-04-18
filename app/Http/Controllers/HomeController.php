<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use DB;
use PDF;
use File;
use App\Models\StockFile;
use App\Models\Sale;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $month = date("F");
        $data = [];
        $data1 = [];
        $sales = Sale::select(DB::raw("SUM(total_amount) as count"), DB::raw("DAYNAME(sales_date) as dayName"),DB::raw('sales_date'))

        ->whereYear('sales_date', date('Y'))
        ->groupBy('sales_date')

        ->get();

        $dailySales = Sale::select(DB::raw("SUM(total_amount) as count1"))
                                ->whereDate('created_at', Carbon::today())
                                ->first();

     //  dd($dailySales);
        $dSales = $dailySales->count1;

        foreach($sales as $row) {
            //    $data['label'][] = date(DATE_ISO8601,strtotime($row->date_time));
            $data['label'][] = $row->sales_date;
            $data['sales'][] =  $row->count;

        }
        $data['chart_data'] = json_encode($data);


        $monthly_sales = Sale::select(\DB::raw("SUM(total_amount) as count"), \DB::raw("MONTHNAME(sales_date) as month_name"),\DB::raw('max(sales_date) as createdAt'))

        ->whereYear('sales_date', date('Y'))
          ->where('order_status', '=', 1)
          ->groupBy('month_name')
          ->orderBy('createdAt')
          ->get();

        foreach($monthly_sales as $row) {

            $data1['label1'][] = $row->month_name;
            $data1['sales1'][] =  $row->count;

        }
        $data['chart_data_1'] = json_encode($data1);


$tProduct = Product::where('status', 1)
                    ->get();
    $productCount = $tProduct->count();

      // dd($data);

      $lProduct = Product::where('qty', '<=', 4)
                    ->where('status', 1)
                    ->get();
        $lowproductCount = $lProduct->count();

        $tSales = Sale::whereMonth('created_at', Carbon::now()->month)
             ->get();

        $salesCount = $tSales->count();


        /*$startDay = Carbon::now()->toDateString(); //returns current day
        $startMonth = Carbon::now();
        $lastMonth =  $startMonth->subMonth()->format('F');
       // dd($lastMonth);
        $start = new Carbon('first day of this month');
        $startDate = $start->toDateString();

        $fileName = $startDate.'('.($lastMonth).').pdf';
        $path = public_path('monthly_report/');*/


    /*    if($startDate == $startDay){

            $product = Product::all();
            $amount = Product::select(DB::raw('sum(qty * selling_price) as total'))->first();
            $total = $amount->total;
            if (File::exists($path . '/' . $fileName)) {
               return view('home', $data, compact('month','productCount','lowproductCount','salesCount'));
          //   dd(true);
            } else {
                $pdf = PDF::loadView('reports.monthlystock',compact('product','total','lastMonth'));
                $pdf->save($path . '/' . $fileName);

                $stockfile = new StockFile;
                $stockfile->file = $fileName;
                $stockfile->save();


                return view('home', $data, compact('month','productCount','lowproductCount','salesCount','dSales'));

            }

        }
        else {
        }*/
            return view('home', $data, compact('month','productCount','lowproductCount','salesCount','dSales'));

    }
    public function pos()
    {
        $month = date("F");
        $data = [];
        $data1 = [];
        $sales = Sale::select(DB::raw("SUM(total_amount) as count"), DB::raw("DAYNAME(sales_date) as dayName"),DB::raw('sales_date'))

            ->whereYear('sales_date', date('Y'))
            ->groupBy('sales_date')

            ->get();

        $dailySales = Sale::select(DB::raw("SUM(total_amount) as count1"))
            ->whereDate('created_at', Carbon::today())
            ->first();

        //  dd($dailySales);
        $dSales = $dailySales->count1;

        foreach($sales as $row) {
            //    $data['label'][] = date(DATE_ISO8601,strtotime($row->date_time));
            $data['label'][] = $row->sales_date;
            $data['sales'][] =  $row->count;

        }
        $data['chart_data'] = json_encode($data);


        $monthly_sales = Sale::select(\DB::raw("SUM(total_amount) as count"), \DB::raw("MONTHNAME(sales_date) as month_name"),\DB::raw('max(sales_date) as createdAt'))

            ->whereYear('sales_date', date('Y'))
            ->where('order_status', '=', 1)
            ->groupBy('month_name')
            ->orderBy('createdAt')
            ->get();

        foreach($monthly_sales as $row) {

            $data1['label1'][] = $row->month_name;
            $data1['sales1'][] =  $row->count;

        }
        $data['chart_data_1'] = json_encode($data1);


        $tProduct = Product::where('status', 1)
            ->get();
        $productCount = $tProduct->count();
        $lProduct = Product::where('qty', '<=', 4)
            ->where('status', 1)
            ->get();
        $lowproductCount = $lProduct->count();

        $tSales = Sale::whereMonth('created_at', Carbon::now()->month)
            ->get();

        $salesCount = $tSales->count();
        return view ('front_dash.pos.pos', $data, compact('month','productCount','lowproductCount','salesCount','dSales'));

    }
    public function hrm()
    {
        return view ('front_dash.hrm.hrm');
    }

    public function finance()
    {
        return view ('front_dash.finance.finance');
    }
    public function report()
    {
        return view ('front_dash.report.report');
    }
    public function other()
    {
        return view ('front_dash.other.other');
    }
}
