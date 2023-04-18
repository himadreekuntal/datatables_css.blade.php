<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EducationEmployee;
use App\Models\EmployeeLogin;
use App\Models\Tax;
use App\Models\User;
use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;
use Spatie\Permission\Models\Role;

class EmployeeController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employees = $this->employeeRepository->all();

        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        return $this->generateBarcodeNumber();
       /* $designation = Designation::all();
        $roles = Role::pluck('name','name')->all();
        return view('employees.create',compact('designation','roles'));*/
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();
      //  dd($input);
       $image = $request->file('image');
        $documents = $request->file('documents');
      //  dd($input);

        if($image == NULL){
            $image_name = NULL;
        }
        else {
            $image_name = rand(111, 999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('employee_images'), $image_name);
        }
        if($documents == NULL ){
            $pdf_name = NULL;
        }
        else{
            $pdf_name = rand(111,999) .'.' .$documents->getClientOriginalExtension();
            $documents->move(public_path('employee_document'),$pdf_name);
        }
//dd($image_name);
        $employee = new Employee;
        $employee->image = $image_name;
        $employee->documents = $pdf_name;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->nationality = $request->nationality;
        $employee->voter_id = $request->voter_id;

        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->religion = $request->religion;
        $employee->gender = $request->gender;

        $dob = Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d');
        $employee->dob = $dob;
        $employee->status= $request->status;
        $employee->rfid= $request->rfid;
        $employee->tax_category= $request->tax_category;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;

        $employee->father_name = $request->father_name;
        $employee->father_phone = $request->father_phone;
        $employee->mother_name = $request->mother_name;
        $employee->mother_phone= $request->mother_phone;
        $employee->father_profession = $request->father_profession;
        $employee->mother_profession= $request->mother_profession;

        $employee->designation_id = $request->designation_id;
        $employee->joining_date = Carbon::createFromFormat('d-m-Y', $request->joining_date)->format('Y-m-d');
        //dd($request->dob, $request->joining_date, $dob, $employee->joining_date);


        $employee->save();

       /* foreach ($request->exam_name as $key => $exam_name) {
            $educationEmployee = new EducationEmployee();
            $educationEmployee->employee_id = $employee->id;
            $educationEmployee->exam_name = $request->exam_name[$key];
            $educationEmployee->division = $request->division[$key];
            $educationEmployee->institute = $request->institute[$key];
            $educationEmployee->passing_year = $request->passing_year[$key];
            $educationEmployee->cgpa = $request->cgpa[$key];
            $educationEmployee->save();
        }*/



        $employeeLogin = new EmployeeLogin();
        $employeeLogin->employee_id = $employee->id;
        $employeeLogin->username = $request->rfid;
        $employeeLogin->password = \Hash::make($request->phone);
        $employeeLogin->email = $request->email;
        $employeeLogin->save();
        Flash::success('Employee saved successfully.');
        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $educationEmployee = EducationEmployee::where('employee_id', $id)->get();
        return view('employees.show',compact('employee','educationEmployee'));
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $designation = Designation::all();
        $tax = Tax::all();
        $educationEmployee = EducationEmployee::where('employee_id', $id)->get();

        return view('employees.edit',compact('employee','designation','educationEmployee','tax'));
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {

        $input = $request->all();
        $imageName = $request->image_name;
        $employeeDoc = $request->employee_document;
        $image = $request->file('image');
        $documents = $request->file('documents');
        // dd($imageName,$employeeDoc);


        if($image == ''){
            $image_name = $imageName;

        }
        else{
            $image_name = rand(111,999) .'.' .$image->getClientOriginalExtension();
            $image->move(public_path('employee_images'),$image_name);
        }
        if($documents == ''){
            $pdf_name = $employeeDoc;

        }
        else{
            $pdf_name = rand(111,999) .'.' .$documents->getClientOriginalExtension();
            $documents->move(public_path('employee_document'),$pdf_name);
        }

        // dd($image_name,$pdf_name);
        $employee = Employee::findorfail($id);
        $employee->image = $image_name;
        $employee->documents = $pdf_name;

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->nationality = $request->nationality;
        $employee->voter_id = $request->voter_id;

        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->religion = $request->religion;
        $employee->gender = $request->gender;

        $dob = Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d');
        $employee->dob = $dob;
        $employee->status= $request->status;
        $employee->rfid= $request->rfid;
        $employee->tax_category= $request->tax_category;
        $employee->present_address = $request->present_address;
        $employee->permanent_address = $request->permanent_address;
        $employee->father_name = $request->father_name;
        $employee->father_phone = $request->father_phone;
        $employee->mother_name = $request->mother_name;
        $employee->mother_phone= $request->mother_phone;
         $employee->designation_id = $request->designation_id;
        $employee->joining_date = Carbon::createFromFormat('d-m-Y', $request->joining_date)->format('Y-m-d');
        //dd($request->dob, $request->joining_date, $dob, $employee->joining_date);


        $employee->save();


       EmployeeLogin::where('employee_id', $id)->delete();
        $employeeLogin = new EmployeeLogin();
        $employeeLogin->employee_id = $employee->id;
        $employeeLogin->username = $request->rfid;
        $employeeLogin->password = \Hash::make($request->phone);
        $employeeLogin->email = $request->email;
        $employeeLogin->save();

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }

    private function generateBarcodeNumber() {
        $serial = mt_rand(1000, 999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($serial)){
            return generateBarcodeNumber();
        }
        $designation = Designation::all();
        $roles = Role::pluck('name','name')->all();
        $tax = Tax::all();
        return view('employees.create',compact('designation','roles','serial','tax'));


    }

    private function barcodeNumberExists($serial) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Employee::where('rfid', $serial)->exists();
    }
}
