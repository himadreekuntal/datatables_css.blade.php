<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLCDetailRequest;
use App\Http\Requests\UpdateLCDetailRequest;
use App\Repositories\LCDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\LCDetail;
use App\Models\LTRPayment;
use App\Models\Brand;
use Session;
use AshAllenDesign\LaravelExchangeRates\Classes\ExchangeRate;
use Carbon\Carbon;
use PDF;
use DB;

class LCDetailController extends AppBaseController
{
    /** @var  LCDetailRepository */
    private $lCDetailRepository;

    public function __construct(LCDetailRepository $lCDetailRepo)
    {
        $this->lCDetailRepository = $lCDetailRepo;
        $this->middleware('permission:lc-list|lc-create|lc-edit|lc-delete', ['only' => ['index','show']]);
        $this->middleware('permission:lc-create', ['only' => ['create','store']]);
        $this->middleware('permission:lc-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:lc-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the LCDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lCDetails = $this->lCDetailRepository->all();

        return view('l_c_details.index')
            ->with('lCDetails', $lCDetails);
    }

    /**
     * Show the form for creating a new LCDetail.
     *
     * @return Response
     */
    public function create()
    {
        $brand = Brand::all();
        $exchangeRates = new ExchangeRate();
        $currency = $exchangeRates->currencies();
      //  dd($currency);
        return view('l_c_details.create',compact('brand','currency'));
    }

    /**
     * Store a newly created LCDetail in storage.
     *
     * @param CreateLCDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateLCDetailRequest $request)
    {
      // $input = $request->all();
        $invoice = $request->file('invoice');

        $lc_document = $request->file('lc_document');

        $boe = $request->file('boe');

        $bank_statement = $request->file('bank_statement');

        if($invoice== null){
            $pdf_name = 'default.pdf';
        }
        else{
                $pdf_name = rand(111,999).'.' .$invoice->getClientOriginalExtension();
                $invoice->move(public_path('lc_document'),$pdf_name);
        }

        if($lc_document== null){
            $pdf_name1 = 'default.pdf';
        }
        else{
                $pdf_name1 = rand(111,999).'.' .$lc_document->getClientOriginalExtension();
                $lc_document->move(public_path('lc_document'),$pdf_name1);
        }


        if($boe== null){
            $pdf_name2 = 'default.pdf';
        }
        else{
                $pdf_name2 = rand(111,999).'.' .$boe->getClientOriginalExtension();
                $boe->move(public_path('lc_document'),$pdf_name2);
        }

        if($bank_statement== null){
            $pdf_name3 = 'default.pdf';
        }
        else{
                $pdf_name3 = rand(111,999).'.' .$bank_statement->getClientOriginalExtension();
                $bank_statement->move(public_path('lc_document'),$pdf_name3);
        }
    //    dd($bank_statement,$pdf_name3);


        $lc = new LCDetail;
        $lc->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
        $lc->brand_id = $request->brand_id;
        $lc->commodities = $request->commodities;
        $lc->amount = $request->amount;
        $lc->currency_type = $request->currency_type;
        $lc->conv_rate = $request->conv_rate;
        $lc->total_amount_bdt = $request->total_amount_bdt;
        $lc->payment_type = $request->payment_type;
        $lc->margin = $request->margin;
        $lc->margin_percentage = $request->margin_percentage;
        $lc->ltr_amount = $request->ltr_amount;
        $lc->payment_remaining = $request->ltr_amount;
        $lc->ltr_status = $request->ltr_status;
        $lc->invoice = $pdf_name;
        $lc->lc_document = $pdf_name1;
        $lc->boe = $pdf_name2;
        $lc->bank_statement = $pdf_name3;
        $lc->save();




      //  $lCDetail = $this->lCDetailRepository->create($input);

        Flash::success('L C Detail saved successfully.');

        return redirect(route('lCDetails.index'));
    }

    /**
     * Display the specified LCDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lCDetail = $this->lCDetailRepository->find($id);

        if (empty($lCDetail)) {
            Flash::error('L C Detail not found');

            return redirect(route('lCDetails.index'));
        }

        return view('l_c_details.show')->with('lCDetail', $lCDetail);
    }

    /**
     * Show the form for editing the specified LCDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lCDetail = $this->lCDetailRepository->find($id);

        $brand = Brand::all();
        $exchangeRates = new ExchangeRate();
        $currency = $exchangeRates->currencies();

        if (empty($lCDetail)) {
            Flash::error('L C Detail not found');

            return redirect(route('lCDetails.index'));
        }

        return view('l_c_details.edit',compact('brand','currency'))->with('lCDetail', $lCDetail);
    }

    /**
     * Update the specified LCDetail in storage.
     *
     * @param int $id
     * @param UpdateLCDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLCDetailRequest $request)
    {
        $invoice = $request->file('invoice');

        $lc_document = $request->file('lc_document');

        $boe = $request->file('boe');

        $bank_statement = $request->file('bank_statement');


        $invoice1 = $request->invoice1;

        $lc_document1 = $request->lc_document1;

        $boe1 = $request->boe1;

        $bank_statement1 = $request->bank_statement1;
       // dd($invoice1);

        if($invoice== null){
            $pdf_name = $invoice1;
        }
        else{
                $pdf_name = rand(111,999).'.' .$invoice->getClientOriginalExtension();
                $invoice->move(public_path('lc_document'),$pdf_name);
        }

        if($lc_document== null){
            $pdf_name1 = $lc_document1;
        }
        else{
                $pdf_name1 = rand(111,999).'.' .$lc_document->getClientOriginalExtension();
                $lc_document->move(public_path('lc_document'),$pdf_name1);
        }


        if($boe== null){
            $pdf_name2 = $boe1;
        }
        else{
                $pdf_name2 = rand(111,999).'.' .$boe->getClientOriginalExtension();
                $boe->move(public_path('lc_document'),$pdf_name2);
        }

        if($bank_statement== null){
            $pdf_name3 = $bank_statement1;
        }
        else{
                $pdf_name3 = rand(111,999).'.' .$bank_statement->getClientOriginalExtension();
                $bank_statement->move(public_path('lc_document'),$pdf_name3);
        }
    //    dd($bank_statement,$pdf_name3);


        $lc = LCDetail::find($id);
        $lc->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
        $lc->brand_id = $request->brand_id;
        $lc->commodities = $request->commodities;
        $lc->amount = $request->amount;
        $lc->currency_type = $request->currency_type;
        $lc->conv_rate = $request->conv_rate;
        $lc->total_amount_bdt = $request->total_amount_bdt;
        $lc->payment_type = $request->payment_type;
        $lc->margin = $request->margin;
        $lc->margin_percentage = $request->margin_percentage;
        $lc->ltr_amount = $request->ltr_amount;
        $lc->payment_remaining = $request->ltr_amount;
        $lc->ltr_status = $request->ltr_status;
        $lc->invoice = $pdf_name;
        $lc->lc_document = $pdf_name1;
        $lc->boe = $pdf_name2;
        $lc->bank_statement = $pdf_name3;
        $lc->save();
        Flash::success('L C Detail saved successfully.');

        return redirect(route('lCDetails.index'));
    }

    /**
     * Remove the specified LCDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lc = LCDetail::find($id);

       dd($lc);

        $lc->forceDelete();

        Flash::success('L C Detail deleted successfully.');

        return redirect(route('lCDetails.index'));
    }

    public function ltrPayment($id)
    {
        $lcDetail = LCDetail::findOrFail($id);

        $lc_id = $lcDetail->id;
        $ltr_amount = $lcDetail->payment_remaining;

        return view('l_t_r_payments.create',compact('lc_id','ltr_amount'));


    }


    public function lcReport($id)
    {
        $lcDetail = LCDetail::where('id',$id)->first();

        $id = $lcDetail->id;

        $fileName = $id.'.pdf';


        $ltr = LTRPayment::where('lc_id',$id)->get();

        $pdf = PDF::loadView('l_c_details.report',compact('lcDetail','ltr'))->setPaper('a4', 'landscape');
        return $pdf->stream($fileName);

    //    return view('l_c_details.report',compact('lcDetail','ltr'));


    }


}
