<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTenderRequest;
use App\Http\Requests\UpdateTenderRequest;
use App\Models\BankGurantee;
use App\Models\PerformanceGurantee;
use App\Models\Tender;
use App\Repositories\TenderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;

class TenderController extends AppBaseController
{
    /** @var  TenderRepository */
    private $tenderRepository;

    public function __construct(TenderRepository $tenderRepo)
    {
        $this->tenderRepository = $tenderRepo;
    }

    /**
     * Display a listing of the Tender.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tenders = $this->tenderRepository->all();

        return view('tenders.index')
            ->with('tenders', $tenders);
    }

    /**
     * Show the form for creating a new Tender.
     *
     * @return Response
     */
    public function create()
    {
        return view('tenders.create');
    }

    /**
     * Store a newly created Tender in storage.
     *
     * @param CreateTenderRequest $request
     *
     * @return Response
     */
    public function store(CreateTenderRequest $request)
    {
        $input = $request->all();

        $tender = $this->tenderRepository->create($input);

        Session::flash('success','Tender Saved Successfully.');

        return redirect(route('tenders.index'));
    }

    /**
     * Display the specified Tender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Session::flash('error','Tender not found.');

            return redirect(route('tenders.index'));
        }

        return view('tenders.show')->with('tender', $tender);
    }

    /**
     * Show the form for editing the specified Tender.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Session::flash('error','Tender not found.');

            return redirect(route('tenders.index'));
        }

        return view('tenders.edit')->with('tender', $tender);
    }

    /**
     * Update the specified Tender in storage.
     *
     * @param int $id
     * @param UpdateTenderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTenderRequest $request)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Session::flash('error','Tender not found.');

            return redirect(route('tenders.index'));
        }

        $tender = $this->tenderRepository->update($request->all(), $id);

        Session::flash('success','Tender Updated Successfully.');

        return redirect(route('tenders.index'));
    }

    /**
     * Remove the specified Tender from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tender = $this->tenderRepository->find($id);

        if (empty($tender)) {
            Flash::error('Tender not found');

            return redirect(route('tenders.index'));
        }

        $this->tenderRepository->delete($id);

        Session::flash('success','Tender Deleted Successfully.');

        return redirect(route('tenders.index'));
    }

    public function updateStatus($id)
    {
        //dd($id);
        $tender = Tender::findOrFail($id);
        if($tender->tender_status == null) {
            $tender->tender_status = 1;
            $tender->save();
        }
        Session::flash('success','Tender Status Updated Successfully.');
        return redirect(route('tenders.index'));
    }

    public function bgStatus($id)
    {
        //dd($id);
        $tender = Tender::findOrFail($id);
        if($tender->bg_status == 1) {
            $tender->bg_status = 2;
            $tender->save();
        }

        $bg = BankGurantee::where('tender_id', $id)->first();

        if($bg->status == 1) {
            $bg->status = 2;
            $bg->save();
        }
        Session::flash('success','Bank Gurantee Status Updated Successfully.');
        return redirect(route('tenders.index'));
    }

    public function pgStatus($id)
    {
        //dd($id);
        $tender = Tender::findOrFail($id);
        if($tender->pg_status == 1) {
            $tender->pg_status = 2;
            $tender->save();
        }
        $pg = PerformanceGurantee::where('tender_id', $id)->first();
        if($pg->status == 1) {
            $pg->status = 2;
            $pg->save();
        }
        Session::flash('success','Performance Gurantee Status Updated Successfully.');
        return redirect(route('tenders.index'));
    }
}
