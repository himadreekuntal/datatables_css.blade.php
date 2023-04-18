<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaxDetailRequest;
use App\Http\Requests\UpdateTaxDetailRequest;
use App\Repositories\TaxDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TaxDetailController extends AppBaseController
{
    /** @var TaxDetailRepository $taxDetailRepository*/
    private $taxDetailRepository;

    public function __construct(TaxDetailRepository $taxDetailRepo)
    {
        $this->taxDetailRepository = $taxDetailRepo;
    }

    /**
     * Display a listing of the TaxDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taxDetails = $this->taxDetailRepository->all();

        return view('tax_details.index')
            ->with('taxDetails', $taxDetails);
    }

    /**
     * Show the form for creating a new TaxDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('tax_details.create');
    }

    /**
     * Store a newly created TaxDetail in storage.
     *
     * @param CreateTaxDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateTaxDetailRequest $request)
    {
        $input = $request->all();

        $taxDetail = $this->taxDetailRepository->create($input);

        Flash::success('Tax Detail saved successfully.');

        return redirect(route('taxDetails.index'));
    }

    /**
     * Display the specified TaxDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taxDetail = $this->taxDetailRepository->find($id);

        if (empty($taxDetail)) {
            Flash::error('Tax Detail not found');

            return redirect(route('taxDetails.index'));
        }

        return view('tax_details.show')->with('taxDetail', $taxDetail);
    }

    /**
     * Show the form for editing the specified TaxDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taxDetail = $this->taxDetailRepository->find($id);

        if (empty($taxDetail)) {
            Flash::error('Tax Detail not found');

            return redirect(route('taxDetails.index'));
        }

        return view('tax_details.edit')->with('taxDetail', $taxDetail);
    }

    /**
     * Update the specified TaxDetail in storage.
     *
     * @param int $id
     * @param UpdateTaxDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaxDetailRequest $request)
    {
        $taxDetail = $this->taxDetailRepository->find($id);

        if (empty($taxDetail)) {
            Flash::error('Tax Detail not found');

            return redirect(route('taxDetails.index'));
        }

        $taxDetail = $this->taxDetailRepository->update($request->all(), $id);

        Flash::success('Tax Detail updated successfully.');

        return redirect(route('taxDetails.index'));
    }

    /**
     * Remove the specified TaxDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taxDetail = $this->taxDetailRepository->find($id);

        if (empty($taxDetail)) {
            Flash::error('Tax Detail not found');

            return redirect(route('taxDetails.index'));
        }

        $this->taxDetailRepository->delete($id);

        Flash::success('Tax Detail deleted successfully.');

        return redirect(route('taxDetails.index'));
    }
}
