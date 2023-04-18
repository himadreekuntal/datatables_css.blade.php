<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMonthlySalaryRequest;
use App\Http\Requests\UpdateMonthlySalaryRequest;
use App\Models\AdvancePayment;
use App\Models\AdvancePaymentDetail;
use App\Models\EmployeeSalary;
use App\Models\MonthlySalary;
use App\Repositories\MonthlySalaryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MonthlySalaryController extends AppBaseController
{
    /** @var MonthlySalaryRepository $monthlySalaryRepository*/
    private $monthlySalaryRepository;

    public function __construct(MonthlySalaryRepository $monthlySalaryRepo)
    {
        $this->monthlySalaryRepository = $monthlySalaryRepo;
    }

    /**
     * Display a listing of the MonthlySalary.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $monthlySalaries = $this->monthlySalaryRepository->all();

        return view('monthly_salaries.index')
            ->with('monthlySalaries', $monthlySalaries);
    }

    /**
     * Show the form for creating a new MonthlySalary.
     *
     * @return Response
     */
    public function create()
    {
       /* $employeeSalary = EmployeeSalary::all();
        foreach ($employeeSalary as $key => $value)
        {
            $advancePayment = AdvancePayment::where('employee_id',$value->emp_id)->first();
                if  (($advancePayment == NULL) || ($advancePayment->status == 1)) {

                        $monthlySalary = new \App\Models\MonthlySalary();
                        $monthlySalary->salary_id = $value->id;
                        $monthlySalary->employee_id = $value->emp_id;
                        $monthlySalary->advance_payment = 0;
                        $monthlySalary->payable_salary = $value->total_salary;
                        $monthlySalary->save();
                    }
                else {
                    $advancePaymentDetail = AdvancePaymentDetail::where('advance_id', $advancePayment->id)->latest()->first();
                    if($advancePaymentDetail == NULL)
                    {
                        $remainingPayment = ($advancePayment->advance_payment) - ($advancePayment->monthly_payment);
                    }
                    else
                    {
                        $remainingPayment = ($advancePaymentDetail->remaining_amount) - ($advancePayment->monthly_payment);
                    }
                    if($remainingPayment == 0)
                        {
                            $aStatus = AdvancePayment::where('employee_id',$value->emp_id)->first();
                            $aStatus->status = 1;
                            $aStatus->save();
                            $advancePaymentDetail = new AdvancePaymentDetail();
                            $advancePaymentDetail->advance_id = $advancePayment->id;
                            $advancePaymentDetail->paid_amount = $advancePayment->monthly_payment;
                            $advancePaymentDetail->remaining_amount = $remainingPayment;
                            $advancePaymentDetail->save();
                            $monthlySalary = new \App\Models\MonthlySalary();
                            $monthlySalary->salary_id = $value->id;
                            $monthlySalary->employee_id = $value->emp_id;
                            $monthlySalary->advance_payment = 0;
                            $monthlySalary->payable_salary = $value->total_salary;
                            $monthlySalary->save();
                        }
                    else
                        {
                            $advancePaymentDetail = new AdvancePaymentDetail();
                            $advancePaymentDetail->advance_id = $advancePayment->id;
                            $advancePaymentDetail->paid_amount = $advancePayment->monthly_payment;
                            $advancePaymentDetail->remaining_amount = $remainingPayment;
                            $advancePaymentDetail->save();
                            $monthlySalary = new \App\Models\MonthlySalary();
                            $monthlySalary->salary_id = $value->id;
                            $monthlySalary->employee_id = $value->emp_id;
                            $monthlySalary->advance_payment = 1;
                            $monthlySalary->payable_salary = $value->total_salary;
                            $monthlySalary->save();
                        }
                }
        }*/

        return view('monthly_salaries.create');
    }

    /**
     * Store a newly created MonthlySalary in storage.
     *
     * @param CreateMonthlySalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateMonthlySalaryRequest $request)
    {
        $input = $request->all();

        $monthlySalary = $this->monthlySalaryRepository->create($input);

        Flash::success('Monthly Salary saved successfully.');

        return redirect(route('monthlySalaries.index'));
    }

    /**
     * Display the specified MonthlySalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monthlySalary = $this->monthlySalaryRepository->find($id);

        if (empty($monthlySalary)) {
            Flash::error('Monthly Salary not found');

            return redirect(route('monthlySalaries.index'));
        }

        return view('monthly_salaries.show')->with('monthlySalary', $monthlySalary);
    }

    /**
     * Show the form for editing the specified MonthlySalary.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monthlySalary = $this->monthlySalaryRepository->find($id);

        if (empty($monthlySalary)) {
            Flash::error('Monthly Salary not found');

            return redirect(route('monthlySalaries.index'));
        }

        return view('monthly_salaries.edit')->with('monthlySalary', $monthlySalary);
    }

    /**
     * Update the specified MonthlySalary in storage.
     *
     * @param int $id
     * @param UpdateMonthlySalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonthlySalaryRequest $request)
    {
        $monthlySalary = $this->monthlySalaryRepository->find($id);

        if (empty($monthlySalary)) {
            Flash::error('Monthly Salary not found');

            return redirect(route('monthlySalaries.index'));
        }

        $monthlySalary = $this->monthlySalaryRepository->update($request->all(), $id);

        Flash::success('Monthly Salary updated successfully.');

        return redirect(route('monthlySalaries.index'));
    }

    /**
     * Remove the specified MonthlySalary from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monthlySalary = $this->monthlySalaryRepository->find($id);

        if (empty($monthlySalary)) {
            Flash::error('Monthly Salary not found');

            return redirect(route('monthlySalaries.index'));
        }

        $this->monthlySalaryRepository->delete($id);

        Flash::success('Monthly Salary deleted successfully.');

        return redirect(route('monthlySalaries.index'));
    }

    public function approve($id)
    {
         MonthlySalary::where('id',$id)->update(['salary_status'=>'1']);

        return redirect(route('monthlySalaries.index'));
        Flash::success('Salary Updated');
    }
}
