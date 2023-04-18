<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaxRequest;
use App\Http\Requests\UpdateTaxRequest;
use App\Models\Tax;
use App\Models\TaxDetail;
use App\Repositories\TaxRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TaxController extends AppBaseController
{
    /** @var TaxRepository $taxRepository*/
    private $taxRepository;

    public function __construct(TaxRepository $taxRepo)
    {
        $this->taxRepository = $taxRepo;
    }

    /**
     * Display a listing of the Tax.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taxes = $this->taxRepository->all();

        return view('taxes.index')
            ->with('taxes', $taxes);
    }

    /**
     * Show the form for creating a new Tax.
     *
     * @return Response
     */
    public function create()
    {
        return view('taxes.create');
    }

    /**
     * Store a newly created Tax in storage.
     *
     * @param CreateTaxRequest $request
     *
     * @return Response
     */
    public function store(CreateTaxRequest $request)
    {
        $tax = new Tax();
        $tax->criteria = $request->criteria;
        $tax->age_limit = $request->age_limit;
        $tax->save();

        foreach ($request->names as $key => $names) {
            $taxDetails = new TaxDetail();
            $taxDetails->tax_id = $tax->id;
            $taxDetails->name = $request->names[$key];
            $taxDetails->amount = $request->amounts[$key];
            $taxDetails->tax_percentage = $request->tax_percentages[$key];
            $taxDetails->save();
        }

        Flash::success('Tax saved successfully.');

        return redirect(route('taxes.index'));
    }

    /**
     * Display the specified Tax.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tax = Tax::findorfail($id);
        $taxDetail = TaxDetail::where('tax_id', $id)->get();

        return view('taxes.show',compact('tax','taxDetail'));
    }

    /**
     * Show the form for editing the specified Tax.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tax = Tax::findorfail($id);
        $taxDetail = TaxDetail::where('tax_id', $id)->get();

        return view('taxes.edit',compact('tax','taxDetail'));
    }

    /**
     * Update the specified Tax in storage.
     *
     * @param int $id
     * @param UpdateTaxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTaxRequest $request)
    {
        $tax = Tax::findorfail($id);
        $tax->criteria = $request->criteria;
        $tax->age_limit = $request->age_limit;
        $tax->save();

        TaxDetail::where('tax_id', $id)->delete();

        foreach ($request->names as $key => $names) {
            $taxDetails = new TaxDetail();
            $taxDetails->tax_id = $tax->id;
            $taxDetails->name = $request->names[$key];
            $taxDetails->amount = $request->amounts[$key];
            $taxDetails->tax_percentage = $request->tax_percentages[$key];
            $taxDetails->save();
        }

        Flash::success('Tax updated successfully.');

        return redirect(route('taxes.index'));
    }

    /**
     * Remove the specified Tax from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tax = $this->taxRepository->find($id);

        if (empty($tax)) {
            Flash::error('Tax not found');

            return redirect(route('taxes.index'));
        }

        $this->taxRepository->delete($id);

        Flash::success('Tax deleted successfully.');

        return redirect(route('taxes.index'));
    }
}
