<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Models\AdvancePayment;
use App\Models\EmployeeLeave;
use App\Models\EmployeeSalary;
use App\Models\LeaveCategory;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Flash;
use Session;

class EmployeeLoginController extends Controller
{
    //
    function check(Request $request){
        //Validate Inputs
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:5|max:30'
        ]);

        $creds = $request->only('email','password');

        if(Auth::guard('employee')->attempt($creds) ){
            return redirect()->route('employee.home');
        }else{
            return redirect()->route('employee.login')->with('fail','Incorrect Credentials');
        }
    }

    public function index(){
        $user = Auth::user();
        return view('employee_dashboard.home');
    }

    function logout(){

        Auth::guard('employee')->logout();
        return redirect('/employee');
    }

    public function leave(Request $request)
    {
            $user = Auth::user();
            $emp_id = $user->employee_id;
            $leave= EmployeeLeave::where('employee_id',$emp_id)->get();
            return view('employee_dashboard.leave',compact('leave'));

    }

    public function leaveCreate(Request $request)
    {
        $user = Auth::user();
        $emp_id = $user->employee_id;
        $leave = LeaveCategory::first();
        $totalLeave = $leave->max_leave;
        $leaveC = EmployeeLeave::select(\DB::raw("SUM(total_days) as count"))->where('employee_id',$emp_id)->where('status',1)->first();
        $leaveT = $leaveC->count;
        $leaveR = $totalLeave- $leaveT;
        return view('employee_dashboard.leave_create',compact('emp_id','leave','leaveC','leaveT','leaveR'));

    }

    public function leaveStore(Request $request)
    {
        $employeeLeave = new EmployeeLeave();
        $employeeLeave->employee_id = $request->employee_id;
        $employeeLeave->leave_id = $request->leave_id;
        $employeeLeave->from =  Carbon::createFromFormat('m/d/Y', $request->from)->format('Y-m-d');
        $employeeLeave->to =  Carbon::createFromFormat('m/d/Y', $request->to)->format('Y-m-d');
        $employeeLeave->total_days = $request->total_days;
        $employeeLeave->leaves_remaining = $request->days_remaining;
        $employeeLeave->status = 0;
        $employeeLeave->description = $request->description;
        $employeeLeave->save();
        return redirect(route('employee.leave'));
    }

    public function advancePayment (){
        $user = Auth::user();
        $employeeID = $user->employee_id;
        $advancePayment = AdvancePayment::where('employee_id',$employeeID)->get();
        $employeeSalary = EmployeeSalary::where('emp_id',$employeeID)->first();

        if($employeeSalary == NULL){
            Session::flash('error','Your salary structure has not been created yet. Please Contact HR.');
            return redirect(route('employee.home'));
        }
        else{


            return view('employee_dashboard.advance_payment',compact('employeeID', 'advancePayment'));
        }


    }
    public function advancePaymentStore(Request $request){
        AdvancePayment::create($request->all());
        return redirect()->back();
    }











}
