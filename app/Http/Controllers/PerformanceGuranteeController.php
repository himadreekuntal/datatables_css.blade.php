<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePerformanceGuranteeRequest;
use App\Http\Requests\UpdatePerformanceGuranteeRequest;
use App\Models\PerformanceGurantee;
use App\Models\Tender;
use App\Repositories\PerformanceGuranteeRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class PerformanceGuranteeController extends AppBaseController
{
    /** @var  PerformanceGuranteeRepository */
    private $performanceGuranteeRepository;

    public function __construct(PerformanceGuranteeRepository $performanceGuranteeRepo)
    {
        $this->performanceGuranteeRepository = $performanceGuranteeRepo;
    }

    /**
     * Display a listing of the PerformanceGurantee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $performanceGurantees = $this->performanceGuranteeRepository->all();

        return view('performance_gurantees.index')
            ->with('performanceGurantees', $performanceGurantees);
    }

    /**
     * Show the form for creating a new PerformanceGurantee.
     *
     * @return Response
     */
    public function create()
    {
        return view('performance_gurantees.create');
    }

    /**
     * Store a newly created PerformanceGurantee in storage.
     *
     * @param CreatePerformanceGuranteeRequest $request
     *
     * @return Response
     */
    public function store(CreatePerformanceGuranteeRequest $request)
    {
        $input = $request->all();
        $pg = $request->file('pg1');
        $noa = $request->file('noa');

        if($pg== null){
            $pdf_name = 'default.pdf';
        }
        else{
            $pdf_name = rand(111,999).'.' .$pg->getClientOriginalExtension();
            $pg->move(public_path('bg'),$pdf_name);
        }

        if($noa== null){
            $pdf_name1 = 'default.pdf';
        }
        else{
            $pdf_name1 = rand(111,999).'.' .$noa->getClientOriginalExtension();
            $noa->move(public_path('bg'),$pdf_name1);
        }

        $performanceGurantee = new PerformanceGurantee();
        $performanceGurantee->tender_id = $request->tender_id1;
        $performanceGurantee->pg_date = Carbon::createFromFormat('d-m-Y', $request->pg_date)->format('Y-m-d');
        $performanceGurantee->pg_no = $request->pg_no;
        $performanceGurantee->pg_amount = $request->pg_amount;
        $performanceGurantee->bank_info  = $request->pg_bank_info;
        $performanceGurantee->validity = Carbon::createFromFormat('d-m-Y', $request->pg_validity)->format('Y-m-d');
        $performanceGurantee->status  = 1;
        $performanceGurantee->pg = $pdf_name;
        $performanceGurantee->noa = $pdf_name1;
        $performanceGurantee->save();

        $tender = Tender::findOrFail($request->tender_id1);
        if($tender->pg_status == null) {
            $tender->pg_status = 1;
         //   dd($tender);
            $tender->save();
        }

        Flash::success('Performance Gurantee saved successfully.');

        return redirect(route('tenders.index'));

    }

    /**
     * Display the specified PerformanceGurantee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $performanceGurantee = $this->performanceGuranteeRepository->find($id);

        if (empty($performanceGurantee)) {
            Flash::error('Performance Gurantee not found');

            return redirect(route('performanceGurantees.index'));
        }

        return view('performance_gurantees.show')->with('performanceGurantee', $performanceGurantee);
    }

    /**
     * Show the form for editing the specified PerformanceGurantee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $performanceGurantee = $this->performanceGuranteeRepository->find($id);

        if (empty($performanceGurantee)) {
            Flash::error('Performance Gurantee not found');

            return redirect(route('performanceGurantees.index'));
        }

        return view('performance_gurantees.edit')->with('performanceGurantee', $performanceGurantee);
    }

    /**
     * Update the specified PerformanceGurantee in storage.
     *
     * @param int $id
     * @param UpdatePerformanceGuranteeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePerformanceGuranteeRequest $request)
    {
        $input = $request->all();
        //dd($request->all());
        $pgDoc = $request->pg;
        $noaDoc = $request->noa;

        $pg = $request->file('pg1');
        $noa = $request->file('noa1');


        if($pg == ''){
            $pdf_name = $pgDoc;

        }
        else{
            $pdf_name = rand(111,999) .'.' .$pg->getClientOriginalExtension();
            $pg->move(public_path('bg'),$pdf_name);
        }

        if($noa == ''){
            $pdf_name1 = $noaDoc;

        }
        else{
            $pdf_name1 = rand(111,999) .'.' .$noa->getClientOriginalExtension();
            $noa->move(public_path('bg'),$pdf_name1);
        }

        $performanceGurantee = PerformanceGurantee ::find($id);
        //dd( $performanceGurantee);
        $performanceGurantee->tender_id = $request->tender_id;
        $performanceGurantee->pg_date = Carbon::createFromFormat('d-m-Y', $request->pg_date)->format('Y-m-d');
        $performanceGurantee->pg_no = $request->pg_no;
        $performanceGurantee->pg_amount = $request->pg_amount;
        $performanceGurantee->bank_info  = $request->bank_info;
        $performanceGurantee->validity = Carbon::createFromFormat('d-m-Y', $request->validity)->format('Y-m-d');
        $performanceGurantee->status  = $request->status;
        $performanceGurantee->pg = $pdf_name;
        $performanceGurantee->noa = $pdf_name1;
        $performanceGurantee->save();
        $tender = Tender::findOrFail($request->tender_id);
        if($tender->pg_status == null) {
            $tender->pg_status = $request->status;
            $tender->save();
        }
        Flash::success('Performance Gurantee updated successfully.');

        return redirect(route('performanceGurantees.index'));
    }

    /**
     * Remove the specified PerformanceGurantee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $performanceGurantee = $this->performanceGuranteeRepository->find($id);

        if (empty($performanceGurantee)) {
            Flash::error('Performance Gurantee not found');

            return redirect(route('performanceGurantees.index'));
        }

        $this->performanceGuranteeRepository->delete($id);

        Flash::success('Performance Gurantee deleted successfully.');

        return redirect(route('performanceGurantees.index'));
    }
}
