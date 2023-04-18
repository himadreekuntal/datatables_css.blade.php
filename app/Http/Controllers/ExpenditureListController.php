<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenditureListRequest;
use App\Http\Requests\UpdateExpenditureListRequest;
use App\Repositories\ExpenditureListRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;

class ExpenditureListController extends AppBaseController
{
    /** @var  ExpenditureListRepository */
    private $expenditureListRepository;

    public function __construct(ExpenditureListRepository $expenditureListRepo)
    {
        $this->expenditureListRepository = $expenditureListRepo;
    }

    /**
     * Display a listing of the ExpenditureList.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $expenditureLists = $this->expenditureListRepository->all();

        return view('expenditure_lists.index')
            ->with('expenditureLists', $expenditureLists);
    }

    /**
     * Show the form for creating a new ExpenditureList.
     *
     * @return Response
     */
    public function create()
    {
        return view('expenditure_lists.create');
    }

    /**
     * Store a newly created ExpenditureList in storage.
     *
     * @param CreateExpenditureListRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenditureListRequest $request)
    {
        $input = $request->all();

        $expenditureList = $this->expenditureListRepository->create($input);
        Session::flash('success','Expenditure List saved successfully.');       

        return redirect(route('expenditureLists.index'));
    }

    /**
     * Display the specified ExpenditureList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expenditureList = $this->expenditureListRepository->find($id);

        if (empty($expenditureList)) {
            Session::flash('error','Expenditure List not found.');   
            return redirect(route('expenditureLists.index'));
        }

        return view('expenditure_lists.show')->with('expenditureList', $expenditureList);
    }

    /**
     * Show the form for editing the specified ExpenditureList.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expenditureList = $this->expenditureListRepository->find($id);

        if (empty($expenditureList)) {
            Session::flash('error','Expenditure List not found.');   

            return redirect(route('expenditureLists.index'));
        }

        return view('expenditure_lists.edit')->with('expenditureList', $expenditureList);
    }

    /**
     * Update the specified ExpenditureList in storage.
     *
     * @param int $id
     * @param UpdateExpenditureListRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenditureListRequest $request)
    {
        $expenditureList = $this->expenditureListRepository->find($id);

        if (empty($expenditureList)) {
            Session::flash('error','Expenditure List not found.');   

            return redirect(route('expenditureLists.index'));
        }

        $expenditureList = $this->expenditureListRepository->update($request->all(), $id);

        Session::flash('success','Expenditure List updated successfully.'); 
        return redirect(route('expenditureLists.index'));
    }

    /**
     * Remove the specified ExpenditureList from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expenditureList = $this->expenditureListRepository->find($id);

        if (empty($expenditureList)) {
            Session::flash('error','Expenditure List not found.');  
            return redirect(route('expenditureLists.index'));
        }

        $this->expenditureListRepository->delete($id);

        Session::flash('success','Expenditure List Deleted successfully.'); 

        return redirect(route('expenditureLists.index'));
    }
}
