<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $advancePayment->employee_id }}</p>
</div>

<!-- Advance Payment Field -->
<div class="form-group">
    {!! Form::label('advance_payment', 'Advance Payment:') !!}
    <p>{{ $advancePayment->advance_payment }}</p>
</div>

<!-- Monthly Payment Field -->
<div class="form-group">
    {!! Form::label('monthly_payment', 'Monthly Payment:') !!}
    <p>{{ $advancePayment->monthly_payment }}</p>
</div>

<!-- Interest Field -->
<div class="form-group">
    {!! Form::label('interest', 'Interest:') !!}
    <p>{{ $advancePayment->interest }}</p>
</div>

<!-- Repayment Time Field -->
<div class="form-group">
    {!! Form::label('repayment_time', 'Repayment Time:') !!}
    <p>{{ $advancePayment->repayment_time }}</p>
</div>

<!-- Loan Reason Field -->
<div class="form-group">
    {!! Form::label('loan_reason', 'Loan Reason:') !!}
    <p>{{ $advancePayment->loan_reason }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $advancePayment->status }}</p>
</div>

<!-- Approve Field -->
<div class="form-group">
    {!! Form::label('approve', 'Approve:') !!}
    <p>{{ $advancePayment->approve }}</p>
</div>

