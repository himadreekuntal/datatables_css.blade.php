<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBankGuranteeRequest;
use App\Http\Requests\UpdateBankGuranteeRequest;
use App\Models\BankGurantee;
use App\Models\Tender;
use App\Repositories\BankGuranteeRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class BankGuranteeController extends AppBaseController
{
    /** @var  BankGuranteeRepository */
    private $bankGuranteeRepository;

    public function __construct(BankGuranteeRepository $bankGuranteeRepo)
    {
        $this->bankGuranteeRepository = $bankGuranteeRepo;
    }

    /**
     * Display a listing of the BankGurantee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bankGurantees = $this->bankGuranteeRepository->all();

        return view('bank_gurantees.index')
            ->with('bankGurantees', $bankGurantees);
    }

    /**
     * Show the form for creating a new BankGurantee.
     *
     * @return Response
     */
    public function create()
    {
        return view('bank_gurantees.create');
    }

    /**
     * Store a newly created BankGurantee in storage.
     *
     * @param CreateBankGuranteeRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $bg = $request->file('bg1');

        if($bg== null){
            $pdf_name = 'default.pdf';
        }
        else{
            $pdf_name = rand(111,999).'.' .$bg->getClientOriginalExtension();
            $bg->move(public_path('bg'),$pdf_name);
        }

      //  dd($request->tender_id);

        $bankGurantee = new BankGurantee();
        $bankGurantee->tender_id = $request->tender_id;
        $bankGurantee->bg_date = Carbon::createFromFormat('d-m-Y', $request->bg_date)->format('Y-m-d');
        $bankGurantee->bg_no = $request->bg_no;
        $bankGurantee->bg_amount = $request->bg_amount;
        $bankGurantee->bank_info  = $request->bank_info;
        $bankGurantee->validity = Carbon::createFromFormat('d-m-Y', $request->validity)->format('Y-m-d');
        $bankGurantee->status  = 1;
        $bankGurantee->bg = $pdf_name;
        $bankGurantee->save();

        $tender = Tender::findOrFail($request->tender_id);
        if($tender->bg_status == null) {
            $tender->bg_status = 1;
            $tender->save();
        }

        Flash::success('Bank Gurantee saved successfully.');

        return redirect(route('tenders.index'));
    }


    /**
     * Display the specified BankGurantee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bankGurantee = $this->bankGuranteeRepository->find($id);

        if (empty($bankGurantee)) {
            Flash::error('Bank Gurantee not found');

            return redirect(route('bankGurantees.index'));
        }

        return view('bank_gurantees.show')->with('bankGurantee', $bankGurantee);
    }

    /**
     * Show the form for editing the specified BankGurantee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bankGurantee = $this->bankGuranteeRepository->find($id);

        if (empty($bankGurantee)) {
            Flash::error('Bank Gurantee not found');

            return redirect(route('bankGurantees.index'));
        }

        return view('bank_gurantees.edit')->with('bankGurantee', $bankGurantee);
    }

    /**
     * Update the specified BankGurantee in storage.
     *
     * @param int $id
     * @param UpdateBankGuranteeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankGuranteeRequest $request)
    {
        $input = $request->all();

        $bgDoc = $request->bg;

        $bg = $request->file('bg1');


        if($bg == ''){
            $pdf_name = $bgDoc;

        }
        else{
            $pdf_name = rand(111,999) .'.' .$bg->getClientOriginalExtension();
            $bg->move(public_path('bg'),$pdf_name);
        }

        $bankGurantee = BankGurantee::find($id);
        $bankGurantee->tender_id = $request->tender_id;
        $bankGurantee->bg_date = Carbon::createFromFormat('d-m-Y', $request->bg_date)->format('Y-m-d');
        $bankGurantee->bg_no = $request->bg_no;
        $bankGurantee->bg_amount = $request->bg_amount;
        $bankGurantee->bank_info  = $request->bank_info;
        $bankGurantee->validity = Carbon::createFromFormat('d-m-Y', $request->validity)->format('Y-m-d');
        $bankGurantee->status  = $request->status;
        $bankGurantee->bg = $pdf_name;
        $bankGurantee->save();

        $tender = Tender::findOrFail($request->tender_id);
        if($tender->bg_status == null) {
            $tender->bg_status = $request->status;
            $tender->save();
        }
        Flash::success('Bank Gurantee updated successfully.');

        return redirect(route('bankGurantees.index'));
    }

    /**
     * Remove the specified BankGurantee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bankGurantee = $this->bankGuranteeRepository->find($id);

        if (empty($bankGurantee)) {
            Flash::error('Bank Gurantee not found');

            return redirect(route('bankGurantees.index'));
        }

        $this->bankGuranteeRepository->delete($id);

        Flash::success('Bank Gurantee deleted successfully.');

        return redirect(route('bankGurantees.index'));
    }
}
