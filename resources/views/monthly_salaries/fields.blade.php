<!-- Salary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salary_id', 'Salary Id:') !!}
    {!! Form::number('salary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Advance Payment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('advance_payment', 'Advance Payment:') !!}
    {!! Form::text('advance_payment', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payable Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payable_salary', 'Payable Salary:') !!}
    {!! Form::text('payable_salary', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('monthlySalaries.index') }}" class="btn btn-light">Cancel</a>
</div>
