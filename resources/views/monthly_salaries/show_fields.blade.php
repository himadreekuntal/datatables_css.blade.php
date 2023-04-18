<!-- Salary Id Field -->
<div class="form-group">
    {!! Form::label('salary_id', 'Salary Id:') !!}
    <p>{{ $monthlySalary->salary_id }}</p>
</div>

<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $monthlySalary->employee_id }}</p>
</div>

<!-- Advance Payment Field -->
<div class="form-group">
    {!! Form::label('advance_payment', 'Advance Payment:') !!}
    <p>{{ $monthlySalary->advance_payment }}</p>
</div>

<!-- Payable Salary Field -->
<div class="form-group">
    {!! Form::label('payable_salary', 'Payable Salary:') !!}
    <p>{{ $monthlySalary->payable_salary }}</p>
</div>

