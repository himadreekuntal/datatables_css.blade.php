<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerEmailDetailRequest;
use App\Http\Requests\UpdateCustomerEmailDetailRequest;
use App\Models\CustomerEmail;
use App\Repositories\CustomerEmailDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CustomerEmailDetailController extends AppBaseController
{
    /** @var  CustomerEmailDetailRepository */
    private $customerEmailDetailRepository;

    public function __construct(CustomerEmailDetailRepository $customerEmailDetailRepo)
    {
        $this->customerEmailDetailRepository = $customerEmailDetailRepo;
    }

    /**
     * Display a listing of the CustomerEmailDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customerEmailDetails = $this->customerEmailDetailRepository->all();

        return view('customer_email_details.index')
            ->with('customerEmailDetails', $customerEmailDetails);
    }

    /**
     * Show the form for creating a new CustomerEmailDetail.
     *
     * @return Response
     */
    public function create()
    {
        $customerEmail = CustomerEmail::all();
        return view('customer_email_details.create',compact('customerEmail'));
    }

    /**
     * Store a newly created CustomerEmailDetail in storage.
     *
     * @param CreateCustomerEmailDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerEmailDetailRequest $request)
    {
        $input = $request->all();

        $customerEmailDetail = $this->customerEmailDetailRepository->create($input);

        Flash::success('Customer Email Detail saved successfully.');

        return redirect(route('customerEmailDetails.index'));
    }

    /**
     * Display the specified CustomerEmailDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerEmailDetail = $this->customerEmailDetailRepository->find($id);

        if (empty($customerEmailDetail)) {
            Flash::error('Customer Email Detail not found');

            return redirect(route('customerEmailDetails.index'));
        }

        return view('customer_email_details.show')->with('customerEmailDetail', $customerEmailDetail);
    }

    /**
     * Show the form for editing the specified CustomerEmailDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerEmailDetail = $this->customerEmailDetailRepository->find($id);
        $customerEmail = CustomerEmail::all();

        if (empty($customerEmailDetail)) {
            Flash::error('Customer Email Detail not found');

            return redirect(route('customerEmailDetails.index'));
        }

        return view('customer_email_details.edit',compact('customerEmail'))->with('customerEmailDetail', $customerEmailDetail);
    }

    /**
     * Update the specified CustomerEmailDetail in storage.
     *
     * @param int $id
     * @param UpdateCustomerEmailDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerEmailDetailRequest $request)
    {
        $customerEmailDetail = $this->customerEmailDetailRepository->find($id);

        if (empty($customerEmailDetail)) {
            Flash::error('Customer Email Detail not found');

            return redirect(route('customerEmailDetails.index'));
        }

        $customerEmailDetail = $this->customerEmailDetailRepository->update($request->all(), $id);

        Flash::success('Customer Email Detail updated successfully.');

        return redirect(route('customerEmailDetails.index'));
    }

    /**
     * Remove the specified CustomerEmailDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerEmailDetail = $this->customerEmailDetailRepository->find($id);

        if (empty($customerEmailDetail)) {
            Flash::error('Customer Email Detail not found');

            return redirect(route('customerEmailDetails.index'));
        }

        $this->customerEmailDetailRepository->delete($id);

        Flash::success('Customer Email Detail deleted successfully.');

        return redirect(route('customerEmailDetails.index'));
    }
}
