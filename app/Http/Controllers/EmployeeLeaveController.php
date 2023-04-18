<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeLeaveRequest;
use App\Http\Requests\UpdateEmployeeLeaveRequest;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\LeaveCategory;
use App\Repositories\EmployeeLeaveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;
use PDF;

class EmployeeLeaveController extends AppBaseController
{
    /** @var EmployeeLeaveRepository $employeeLeaveRepository*/
    private $employeeLeaveRepository;

    public function __construct(EmployeeLeaveRepository $employeeLeaveRepo)
    {
        $this->employeeLeaveRepository = $employeeLeaveRepo;
    }

    /**
     * Display a listing of the EmployeeLeave.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employeeLeaves = $this->employeeLeaveRepository->all();

        return view('employee_leaves.index')
            ->with('employeeLeaves', $employeeLeaves);
    }

    /**
     * Show the form for creating a new EmployeeLeave.
     *
     * @return Response
     */
    public function create()
    {
        return view('employee_leaves.create');
    }

    /**
     * Store a newly created EmployeeLeave in storage.
     *
     * @param CreateEmployeeLeaveRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeLeaveRequest $request)
    {
        $input = $request->all();

        $employeeLeave = $this->employeeLeaveRepository->create($input);

        Flash::success('Employee Leave saved successfully.');

        return redirect(route('employeeLeaves.index'));
    }

    /**
     * Display the specified EmployeeLeave.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employeeLeave = $this->employeeLeaveRepository->find($id);

        if (empty($employeeLeave)) {
            Flash::error('Employee Leave not found');

            return redirect(route('employeeLeaves.index'));
        }

        return view('employee_leaves.show')->with('employeeLeave', $employeeLeave);
    }

    /**
     * Show the form for editing the specified EmployeeLeave.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employeeLeave = $this->employeeLeaveRepository->find($id);

        if (empty($employeeLeave)) {
            Flash::error('Employee Leave not found');

            return redirect(route('employeeLeaves.index'));
        }

        return view('employee_leaves.edit')->with('employeeLeave', $employeeLeave);
    }

    /**
     * Update the specified EmployeeLeave in storage.
     *
     * @param int $id
     * @param UpdateEmployeeLeaveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeLeaveRequest $request)
    {
        $employeeLeave = $this->employeeLeaveRepository->find($id);

        if (empty($employeeLeave)) {
            Flash::error('Employee Leave not found');

            return redirect(route('employeeLeaves.index'));
        }

        $employeeLeave = $this->employeeLeaveRepository->update($request->all(), $id);

        Flash::success('Employee Leave updated successfully.');

        return redirect(route('employeeLeaves.index'));
    }

    /**
     * Remove the specified EmployeeLeave from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employeeLeave = $this->employeeLeaveRepository->find($id);

        if (empty($employeeLeave)) {
            Flash::error('Employee Leave not found');

            return redirect(route('employeeLeaves.index'));
        }

        $this->employeeLeaveRepository->delete($id);

        Flash::success('Employee Leave deleted successfully.');

        return redirect(route('employeeLeaves.index'));
    }

    public function approve($id)
    {
        $employeeLeave = EmployeeLeave::findOrFail($id);
        $employeeLeave->status = '1';
        $employeeLeave->save();
        Session::Flash('success','Leave Approved.');
        return redirect(route('employeeLeaves.index'));
    }

    public function disapprove($id)
    {
        $employeeLeave = EmployeeLeave::findOrFail($id);
        $employeeLeave->status = '2';
        $employeeLeave->save();
        Session::Flash('success','Leave not Approved.');
        return redirect(route('employeeLeaves.index'));
    }
    public function reportLeave()
    {
        $employee = Employee::all();
        return view('employee_leaves.leave',compact('employee'));
    }
    public function displayLeaveReport(Request $request)
    {

        $emp_id = $request->emp_id;
        $emp = Employee::where('id',$emp_id)->first();
        $leave = LeaveCategory::first();
        $totalLeave = $leave->max_leave;
        $leaveC = EmployeeLeave::select(\DB::raw("SUM(total_days) as count"))->where('employee_id',$emp_id)->where('status',1)->first();
        $leaveT = $leaveC->count;
        $leaveR = $totalLeave- $leaveT;
        $leave= EmployeeLeave::where('employee_id',$emp_id)->get();
        $pdf = PDF::loadview ('employee_leaves.leaveReport',compact('emp','leave','leaveR','leaveT'));
        return $pdf->stream('report.pdf');



     /*   $pdf = PDF::loadView('reports.productreport',compact('sale','fromDate','toDate','total','name','quantity'));
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->stream('report.pdf');*/

    }
}
