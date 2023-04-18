<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Repositories\DesignationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DesignationController extends AppBaseController
{
    /** @var  DesignationRepository */
    private $designationRepository;

    public function __construct(DesignationRepository $designationRepo)
    {
        $this->designationRepository = $designationRepo;
    }

    /**
     * Display a listing of the Designation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $designations = $this->designationRepository->all();

        return view('designations.index')
            ->with('designations', $designations);
    }

    /**
     * Show the form for creating a new Designation.
     *
     * @return Response
     */
    public function create()
    {
        $department = Department::where('status',1)->get();
        $department1 = Department::where('status',1)->get();
        return view('designations.create',compact('department','department1'));
    }

    /**
     * Store a newly created Designation in storage.
     *
     * @param CreateDesignationRequest $request
     *
     * @return Response
     */
    public function store(CreateDesignationRequest $request)
    {

            $designation = new Designation();
            $designation->designation = $request->designation;
            $designation->dept_id = $request->dept_id;
            $designation->save();

        Flash::success('Designation saved successfully.');

        return redirect(route('designations.index'));
    }

    /**
     * Display the specified Designation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $designation = $this->designationRepository->find($id);

        if (empty($designation)) {
            Flash::error('Designation not found');

            return redirect(route('designations.index'));
        }

        return view('designations.show')->with('designation', $designation);
    }

    /**
     * Show the form for editing the specified Designation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = Department::all();
        $designation = $this->designationRepository->find($id);

        if (empty($designation)) {
            Flash::error('Designation not found');

            return redirect(route('designations.index'));
        }

        return view('designations.edit',compact('department'))->with('designation', $designation);
    }

    /**
     * Update the specified Designation in storage.
     *
     * @param int $id
     * @param UpdateDesignationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDesignationRequest $request)
    {
        $designation = $this->designationRepository->find($id);

        if (empty($designation)) {
            Flash::error('Designation not found');

            return redirect(route('designations.index'));
        }

        $designation = $this->designationRepository->update($request->all(), $id);

        Flash::success('Designation updated successfully.');

        return redirect(route('designations.index'));
    }

    /**
     * Remove the specified Designation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $designation = $this->designationRepository->find($id);

        if (empty($designation)) {
            Flash::error('Designation not found');

            return redirect(route('designations.index'));
        }

        $this->designationRepository->delete($id);

        Flash::success('Designation deleted successfully.');

        return redirect(route('designations.index'));
    }

    public function updateStatus(Request $request)
    {
        $designation = Designation::findOrFail($request->id);
        $designation->status = $request->status;
        $designation->save();
        Session::Flash('success','Department Status Updated successfully.');
    }
}
