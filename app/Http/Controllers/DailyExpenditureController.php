<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDailyExpenditureRequest;
use App\Http\Requests\UpdateDailyExpenditureRequest;
use App\Models\BankTransaction;
use App\Models\CashHand;
use App\Repositories\DailyExpenditureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\ExpenditureList;
use Flash;
use App\Models\DailyExpenditure;
use App\Models\Sale;
use Response;
use Session;
use Carbon\Carbon;
use PDF;
use DB;


class DailyExpenditureController extends AppBaseController
{
    /** @var  DailyExpenditureRepository */
    private $dailyExpenditureRepository;

    public function __construct(DailyExpenditureRepository $dailyExpenditureRepo)
    {
        $this->dailyExpenditureRepository = $dailyExpenditureRepo;
    }

    /**
     * Display a listing of the DailyExpenditure.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dailyExpenditures = $this->dailyExpenditureRepository->all();

        return view('daily_expenditures.index')
            ->with('dailyExpenditures', $dailyExpenditures);
    }

    /**
     * Show the form for creating a new DailyExpenditure.
     *
     * @return Response
     */
    public function create()
    {
        $expenditure = ExpenditureList::all();

        return view('daily_expenditures.create',compact('expenditure'));
    }

    /**
     * Store a newly created DailyExpenditure in storage.
     *
     * @param CreateDailyExpenditureRequest $request
     *
     * @return Response
     */
    public function store(CreateDailyExpenditureRequest $request)
    {
        $input = $request->all();

        $dailyExpenditure = $this->dailyExpenditureRepository->create($input);
        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();

        if($cashHand == NULL)
        {
            $cashHand = new CashHand();
            $cashHand->date = date('Y-m-d');
            $cashHand->amount = $request->amount;
            $cashHand->save();
        }
        else
        {
            $totalcashHand = ($cashHand->amount)-($request->amount);
            CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);
        }

        Session::flash('success','Expenditure saved successfully.');

        return redirect(route('dailyExpenditures.index'));
    }

    /**
     * Display the specified DailyExpenditure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dailyExpenditure = $this->dailyExpenditureRepository->find($id);

        if (empty($dailyExpenditure)) {

            Session::flash('error','Expenditure not found.');

            return redirect(route('dailyExpenditures.index'));
        }

        return view('daily_expenditures.show')->with('dailyExpenditure', $dailyExpenditure);
    }

    /**
     * Show the form for editing the specified DailyExpenditure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dailyExpenditure = $this->dailyExpenditureRepository->find($id);
        $expenditure = ExpenditureList::all();
        if (empty($dailyExpenditure)) {
            Session::flash('error','Expenditure not found.');

            return redirect(route('dailyExpenditures.index'));
        }

        return view('daily_expenditures.edit',compact('expenditure'))->with('dailyExpenditure', $dailyExpenditure);
    }

    /**
     * Update the specified DailyExpenditure in storage.
     *
     * @param int $id
     * @param UpdateDailyExpenditureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDailyExpenditureRequest $request)
    {
        $dailyExpenditure = DailyExpenditure::findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;

        $cashH = $amount+($dailyExpenditure->amount);

$dailyExpenditure->expenditure_id = $request->expenditure_id;
        $dailyExpenditure->amount = $request->amount;
        $dailyExpenditure->date = $request->date;
        $dailyExpenditure->save();

        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();

        if($cashHand == NULL)
        {
            $cashHand = new CashHand();
            $cashHand->date = date('Y-m-d');
            $cashHand->amount = $request->amount;
            $cashHand->save();
        }
        else
        {
            $totalcashHand = ($cashH)-($request->amount);
            CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);
        }

        Session::flash('success','Expenditure updated successfully.');

        return redirect(route('dailyExpenditures.index'));
    }

    /**
     * Remove the specified DailyExpenditure from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dailyExpenditure = DailyExpenditure::findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;
        $cashH = $amount+($dailyExpenditure->amount);
        $dailyExpenditure->delete();
        $tDate = date('Y-m-d');
        CashHand::where('date',$tDate)->update(['amount'=>$cashH]);


        Session::flash('success','Expenditure deleted successfully.');

        return redirect(route('dailyExpenditures.index'));
    }

    public function reportExpense(Request $request)
    {
        return view('daily_expenditures.expense');

    }

    public function displayExpenseReport(Request $request){
            $fromDate = $request->input('start_date');
            $date = explode("-", $fromDate);
            $month = $date[1];
            $year = $date[2];
            $date = Carbon::createFromFormat('d-m-Y', $fromDate);
            $monthName = $date->format('F');
            $expenses = DailyExpenditure::whereYear('date', '=', $year)
                                        ->whereMonth('date', '=', $month)
                                        ->get();
            $amount = DailyExpenditure::select(DB::raw('sum(amount) as total'))
                            ->whereYear('date', '=', $year)
                            ->whereMonth('date', '=', $month)
                            ->first();
            $total = $amount->total;
            $fileName = 'Expenses of.'.$monthName.'.pdf';
            $pdf = PDF::loadView('daily_expenditures.reportAll',compact('expenses','monthName','total'))->setPaper('a4', 'portrait');
            return $pdf->stream($fileName);
    }

    public function reportBalance(Request $request)
    {
               return view('daily_expenditures.balance');
    }

    public function displayBalanceSheet(Request $request)
       {
               $fromDate = $request->input('start_date');
               $date = explode("-", $fromDate);
               $month = $date[1];
               $year = $date[2];
               $date = Carbon::createFromFormat('d-m-Y', $fromDate);
               $monthName = $date->format('F');
               $expenses = DailyExpenditure::select('expenditure_id','date',\DB::raw("SUM(amount) as expense"))
                                ->groupBy('expenditure_id')
                                -> whereYear('date', '=', $year)
                                ->whereMonth('date', '=', $month)
                                ->get();
               $amount = DailyExpenditure::select(DB::raw('sum(amount) as total'))
                               ->whereYear('date', '=', $year)
                               ->whereMonth('date', '=', $month)
                               ->first();

                $sales = Sale::whereYear('sales_date', '=', $year)
                                        ->whereMonth('sales_date', '=', $month)
                                        ->get();
                $total = $amount->total;
                $fileName = 'Balance Sheet of.'.$monthName.'.pdf';
                $pdf = PDF::loadView('daily_expenditures.balanceSheet',compact('expenses','monthName','total'))->setPaper('a4', 'portrait');
                 return $pdf->stream($fileName);
        }

        public function cashBook(Request $request)
            {
                return view('daily_expenditures.cashBook');
            }

            public function displayCashBook(Request $request)
               {

                $fromDate = $request->input('start_date');
                $date = Carbon::createFromFormat('d-m-Y', $fromDate);
               $fdate = $date->format('Y-m-d');


                $expenses = DailyExpenditure::where('date', '=', $fdate)
                               ->get();
               // dd($expenses);

                $amount = DailyExpenditure::select(DB::raw('sum(amount) as total'))
                                    ->where('date', '=', $fdate)
                                    ->first();
                $total = $amount->total;

                $sales = Sale::where('sales_date', '=', $fdate)->where('order_status',0)
                                    ->get();
               // dd($sales);
                $salesTotal = Sale::select(DB::raw('sum(total_amount) as stotal'))
                                   ->where('sales_date', '=', $fdate)->where('order_status',0)
                                    ->first();


                  $stotal = $salesTotal->stotal;
                   $bankTransaction = BankTransaction::select(DB::raw('sum(amount) as btotal'))
                       ->where('date', '=', $fdate)
                       ->first();
                   $bankT = $bankTransaction->btotal;
                   $yesterday = Carbon::yesterday()->format('Y-m-d');
                   $cashHY = CashHand::where('date',$yesterday)->first();
                   $cashY = $cashHY ->amount;


                $salesTotal1 = Sale::select(DB::raw('sum(paid) as total2'))
                                   ->where('sales_date', '=', $fdate)
                                   ->where('order_status',0)
                                   ->where(function($q){
                                        $q->where('payment_status', '=', "Partial Payment")
                                         ->orWhere('payment_status', '=', "Full Payment");
                                 })
                                    ->first();
                 $totalSales = $salesTotal1->total2;
                 $cashHand = $cashY + $totalSales - $total-$bankT;
                 $fileName = 'Cash Book of.'.$fromDate.'.pdf';
                $pdf = PDF::loadView('daily_expenditures.cashBookReport',compact('expenses','fromDate','total','sales','stotal','totalSales','cashHand','cashY','bankT'))->setPaper('a4', 'landscape');
                    return $pdf->stream($fileName);
                }

        }
