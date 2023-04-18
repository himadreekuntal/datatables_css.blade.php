<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLTRPaymentRequest;
use App\Http\Requests\UpdateLTRPaymentRequest;
use App\Repositories\LTRPaymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\LCDetail;
use App\Models\LTRPayment;
use Carbon\Carbon;

class LTRPaymentController extends AppBaseController
{
    /** @var  LTRPaymentRepository */
    private $lTRPaymentRepository;

    public function __construct(LTRPaymentRepository $lTRPaymentRepo)
    {
        $this->lTRPaymentRepository = $lTRPaymentRepo;
    }

    /**
     * Display a listing of the LTRPayment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $lTRPayments = $this->lTRPaymentRepository->all();

        return view('l_t_r_payments.index')
            ->with('lTRPayments', $lTRPayments);
    }

    /**
     * Show the form for creating a new LTRPayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('l_t_r_payments.create');
    }

    /**
     * Store a newly created LTRPayment in storage.
     *
     * @param CreateLTRPaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateLTRPaymentRequest $request)
    {
      //  $input = $request->all();
      $bank_statement = $request->file('bank_statement_ap');

      
      if($bank_statement== null){
        $pdf_name = 'default.pdf';
        }
     else{
        $pdf_name = rand(111,999).'.' .$bank_statement->getClientOriginalExtension();
        $bank_statement->move(public_path('lc_document'),$pdf_name);
        }

        $ltr = new LTRPayment;

        $ltr->lc_id = $request->lc_id;
        $ltr->payment_date = Carbon::createFromFormat('d-m-Y', $request->payment_date)->format('Y-m-d');
        $ltr->payment_amount = $request->payment_amount;
        $ltr->payment_remaining = $request->payment_remaining;
        $ltr->bank_statement_ap = $pdf_name;
        $ltr->save();
      
        $lc_id = $request->lc_id;
        $remaining_amount = $request->payment_remaining;
        if($remaining_amount == 0){
            $status = "LTR Adjusted";
        }
        else{
            $status = "LTR Partially Adjusted";
        }

        $payment_date = Carbon::createFromFormat('d-m-Y', $request->payment_date)->format('Y-m-d');
        $lc = LCDetail::findOrFail($lc_id);
        $lc-> payment_remaining = $remaining_amount;
        $lc->last_payment = $payment_date;
        $lc->ltr_status = $status;
        $lc->save();
        Flash::success('LTR Payment saved successfully.');

        return redirect(route('lTRPayments.index'));
    }

    /**
     * Display the specified LTRPayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lTRPayment = $this->lTRPaymentRepository->find($id);

        if (empty($lTRPayment)) {
            Flash::error('L T R Payment not found');

            return redirect(route('lTRPayments.index'));
        }

        return view('l_t_r_payments.show')->with('lTRPayment', $lTRPayment);
    }

    /**
     * Show the form for editing the specified LTRPayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lTRPayment = $this->lTRPaymentRepository->find($id);

        if (empty($lTRPayment)) {
            Flash::error('L T R Payment not found');

            return redirect(route('lTRPayments.index'));
        }

        return view('l_t_r_payments.edit')->with('lTRPayment', $lTRPayment);
    }

    /**
     * Update the specified LTRPayment in storage.
     *
     * @param int $id
     * @param UpdateLTRPaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLTRPaymentRequest $request)
    {
        $lTRPayment = $this->lTRPaymentRepository->find($id);

        if (empty($lTRPayment)) {
            Flash::error('L T R Payment not found');

            return redirect(route('lTRPayments.index'));
        }

        $lTRPayment = $this->lTRPaymentRepository->update($request->all(), $id);

        Flash::success('L T R Payment updated successfully.');

        return redirect(route('lTRPayments.index'));
    }

    /**
     * Remove the specified LTRPayment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lTRPayment = $this->lTRPaymentRepository->find($id);

        if (empty($lTRPayment)) {
            Flash::error('L T R Payment not found');

            return redirect(route('lTRPayments.index'));
        }

        $this->lTRPaymentRepository->delete($id);

        Flash::success('L T R Payment deleted successfully.');

        return redirect(route('lTRPayments.index'));
    }
}
