<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeSalaryRequest;
use App\Http\Requests\UpdateEmployeeSalaryRequest;
use App\Models\Employee;
use App\Models\TaxDetail;
use App\Repositories\EmployeeSalaryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class EmployeeSalaryController extends AppBaseController
{
    /** @var EmployeeSalaryRepository $employeeSalaryRepository*/
    private $employeeSalaryRepository;

    public function __construct(EmployeeSalaryRepository $employeeSalaryRepo)
    {
        $this->employeeSalaryRepository = $employeeSalaryRepo;
    }

    /**
     * Display a listing of the EmployeeSalary.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $employeeSalaries = $this->employeeSalaryRepository->all();

        return view('employee_salaries.index')
            ->with('employeeSalaries', $employeeSalaries);
    }

    /**
     * Show the form for creating a new EmployeeSalary.
     *
     * @return Response
     */
    public function create()
    {
        $employee =DB::table('employees')
            ->select(
                'employees.*'
            )
            ->leftJoin('employee_salaries','employee_salaries.emp_id','=','employees.id')
            ->Where('employee_salaries.emp_id', '=', null)
            ->get();
        return view('employee_salaries.create',compact('employee'));
    }

    /**
     * Store a newly created EmployeeSalary in storage.
     *
     * @param CreateEmployeeSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeSalaryRequest $request)
    {
        $input = $request->all();

        $employeeSalary = $this->employeeSalaryRepository->create($input);

        Flash::success('Employee Salary saved successfully.');

        return redirect(route('employeeSalaries.index'));
    }

    /**
     * Display the specified EmployeeSalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employeeSalary = $this->employeeSalaryRepository->find($id);

        if (empty($employeeSalary)) {
            Flash::error('Employee Salary not found');

            return redirect(route('employeeSalaries.index'));
        }

        return view('employee_salaries.show')->with('employeeSalary', $employeeSalary);
    }

    /**
     * Show the form for editing the specified EmployeeSalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $employeeSalary = $this->employeeSalaryRepository->find($id);

        if (empty($employeeSalary)) {
            Flash::error('Employee Salary not found');

            return redirect(route('employeeSalaries.index'));
        }

        return view('employee_salaries.edit')->with('employeeSalary', $employeeSalary);
    }

    /**
     * Update the specified EmployeeSalary in storage.
     *
     * @param int $id
     * @param UpdateEmployeeSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeSalaryRequest $request)
    {
        $employeeSalary = $this->employeeSalaryRepository->find($id);

        if (empty($employeeSalary)) {
            Flash::error('Employee Salary not found');

            return redirect(route('employeeSalaries.index'));
        }

        $employeeSalary = $this->employeeSalaryRepository->update($request->all(), $id);

        Flash::success('Employee Salary updated successfully.');

        return redirect(route('employeeSalaries.index'));
    }

    /**
     * Remove the specified EmployeeSalary from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employeeSalary = $this->employeeSalaryRepository->find($id);

        if (empty($employeeSalary)) {
            Flash::error('Employee Salary not found');

            return redirect(route('employeeSalaries.index'));
        }

        $this->employeeSalaryRepository->delete($id);

        Flash::success('Employee Salary deleted successfully.');

        return redirect(route('employeeSalaries.index'));
    }

    public function tax(Request $request)
    {
        /*$baseSalary = $request->totalA;
        $empID = $request->empId;
        //   dd($baseSalary);

        $emp = Employee::where('id',$empID)->first();
        $tax = $emp->tax_category;
        $calculateTaxOnAmount = $baseSalary * 12;
        $remainingAmount      = $calculateTaxOnAmount;
        $amount               = $calculateTaxOnAmount;
        $arrayAmount          = array();

        $taxDetails = TaxDetail::where('tax_id', $tax)->get();




        foreach ($taxDetails as $key => $value) {
            $resultArray = array();
            if ($remainingAmount > $value['amount']) {
                $sum                       = $value['amount'] - 0;
                $resultArray['amount']     = $sum;
                $resultArray['percentage'] = $value['tax_percentage'];
                array_push($arrayAmount, $resultArray);
                $remainingAmount = $remainingAmount - $sum;
                // echo $remainingAmount;
            } else {
                $resultArray['amount']     = $remainingAmount;
                $resultArray['percentage'] = $value['tax_percentage'];
                array_push($arrayAmount, $resultArray);
                break;
            }
        }
        $resultantTaxAmount = 0;
        foreach ($arrayAmount as $key => $value) {
            $cal                = (($value['amount'] * $value['percentage']) / 100);
            $resultantTaxAmount = $resultantTaxAmount + $cal;
        }
        $taxAmount =  round($resultantTaxAmount);*/

        $taxAmount = 0;
        return $taxAmount;

    }


}
