<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvancePaymentRequest;
use App\Http\Requests\UpdateAdvancePaymentRequest;
use App\Repositories\AdvancePaymentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdvancePaymentController extends AppBaseController
{
    /** @var AdvancePaymentRepository $advancePaymentRepository*/
    private $advancePaymentRepository;

    public function __construct(AdvancePaymentRepository $advancePaymentRepo)
    {
        $this->advancePaymentRepository = $advancePaymentRepo;
    }

    /**
     * Display a listing of the AdvancePayment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $advancePayments = $this->advancePaymentRepository->all();

        return view('advance_payments.index')
            ->with('advancePayments', $advancePayments);
    }

    /**
     * Show the form for creating a new AdvancePayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('advance_payments.create');
    }

    /**
     * Store a newly created AdvancePayment in storage.
     *
     * @param CreateAdvancePaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvancePaymentRequest $request)
    {
        $input = $request->all();

        $advancePayment = $this->advancePaymentRepository->create($input);

        Flash::success('Advance Payment saved successfully.');

        return redirect(route('advancePayments.index'));
    }

    /**
     * Display the specified AdvancePayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $advancePayment = $this->advancePaymentRepository->find($id);

        if (empty($advancePayment)) {
            Flash::error('Advance Payment not found');

            return redirect(route('advancePayments.index'));
        }

        return view('advance_payments.show')->with('advancePayment', $advancePayment);
    }

    /**
     * Show the form for editing the specified AdvancePayment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $advancePayment = $this->advancePaymentRepository->find($id);

        if (empty($advancePayment)) {
            Flash::error('Advance Payment not found');

            return redirect(route('advancePayments.index'));
        }

        return view('advance_payments.edit')->with('advancePayment', $advancePayment);
    }

    /**
     * Update the specified AdvancePayment in storage.
     *
     * @param int $id
     * @param UpdateAdvancePaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvancePaymentRequest $request)
    {
        $advancePayment = $this->advancePaymentRepository->find($id);

        if (empty($advancePayment)) {
            Flash::error('Advance Payment not found');

            return redirect(route('advancePayments.index'));
        }

        $advancePayment = $this->advancePaymentRepository->update($request->all(), $id);

        Flash::success('Advance Payment updated successfully.');

        return redirect(route('advancePayments.index'));
    }

    /**
     * Remove the specified AdvancePayment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $advancePayment = $this->advancePaymentRepository->find($id);

        if (empty($advancePayment)) {
            Flash::error('Advance Payment not found');

            return redirect(route('advancePayments.index'));
        }

        $this->advancePaymentRepository->delete($id);

        Flash::success('Advance Payment deleted successfully.');

        return redirect(route('advancePayments.index'));
    }
}
