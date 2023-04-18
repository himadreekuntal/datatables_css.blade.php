<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdvancePaymentDetailRequest;
use App\Http\Requests\UpdateAdvancePaymentDetailRequest;
use App\Repositories\AdvancePaymentDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdvancePaymentDetailController extends AppBaseController
{
    /** @var AdvancePaymentDetailRepository $advancePaymentDetailRepository*/
    private $advancePaymentDetailRepository;

    public function __construct(AdvancePaymentDetailRepository $advancePaymentDetailRepo)
    {
        $this->advancePaymentDetailRepository = $advancePaymentDetailRepo;
    }

    /**
     * Display a listing of the AdvancePaymentDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $advancePaymentDetails = $this->advancePaymentDetailRepository->all();

        return view('advance_payment_details.index')
            ->with('advancePaymentDetails', $advancePaymentDetails);
    }

    /**
     * Show the form for creating a new AdvancePaymentDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('advance_payment_details.create');
    }

    /**
     * Store a newly created AdvancePaymentDetail in storage.
     *
     * @param CreateAdvancePaymentDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateAdvancePaymentDetailRequest $request)
    {
        $input = $request->all();

        $advancePaymentDetail = $this->advancePaymentDetailRepository->create($input);

        Flash::success('Advance Payment Detail saved successfully.');

        return redirect(route('advancePaymentDetails.index'));
    }

    /**
     * Display the specified AdvancePaymentDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $advancePaymentDetail = $this->advancePaymentDetailRepository->find($id);

        if (empty($advancePaymentDetail)) {
            Flash::error('Advance Payment Detail not found');

            return redirect(route('advancePaymentDetails.index'));
        }

        return view('advance_payment_details.show')->with('advancePaymentDetail', $advancePaymentDetail);
    }

    /**
     * Show the form for editing the specified AdvancePaymentDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $advancePaymentDetail = $this->advancePaymentDetailRepository->find($id);

        if (empty($advancePaymentDetail)) {
            Flash::error('Advance Payment Detail not found');

            return redirect(route('advancePaymentDetails.index'));
        }

        return view('advance_payment_details.edit')->with('advancePaymentDetail', $advancePaymentDetail);
    }

    /**
     * Update the specified AdvancePaymentDetail in storage.
     *
     * @param int $id
     * @param UpdateAdvancePaymentDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdvancePaymentDetailRequest $request)
    {
        $advancePaymentDetail = $this->advancePaymentDetailRepository->find($id);

        if (empty($advancePaymentDetail)) {
            Flash::error('Advance Payment Detail not found');

            return redirect(route('advancePaymentDetails.index'));
        }

        $advancePaymentDetail = $this->advancePaymentDetailRepository->update($request->all(), $id);

        Flash::success('Advance Payment Detail updated successfully.');

        return redirect(route('advancePaymentDetails.index'));
    }

    /**
     * Remove the specified AdvancePaymentDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $advancePaymentDetail = $this->advancePaymentDetailRepository->find($id);

        if (empty($advancePaymentDetail)) {
            Flash::error('Advance Payment Detail not found');

            return redirect(route('advancePaymentDetails.index'));
        }

        $this->advancePaymentDetailRepository->delete($id);

        Flash::success('Advance Payment Detail deleted successfully.');

        return redirect(route('advancePaymentDetails.index'));
    }
}
