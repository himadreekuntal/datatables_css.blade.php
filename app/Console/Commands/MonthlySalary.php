<?php

namespace App\Console\Commands;

use App\Models\AdvancePayment;
use App\Models\AdvancePaymentDetail;
use App\Models\EmployeeSalary;
use Illuminate\Console\Command;

class MonthlySalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employeeSalary = EmployeeSalary::all();
        foreach ($employeeSalary as $key => $value)
        {
            $advancePayment = AdvancePayment::where('employee_id',$value->emp_id)->first();
            if  (($advancePayment == NULL) || ($advancePayment->status == 1)) {
                /*  $advancePayment = 0;
                  $payableSalary = $value->total_salary;*/
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
        }
    }
}
