<!-- Advance Id Field -->
<div class="form-group">
    {!! Form::label('advance_id', 'Advance Id:') !!}
    <p>{{ $advancePaymentDetail->advance_id }}</p>
</div>

<!-- Paid Amount Field -->
<div class="form-group">
    {!! Form::label('paid_amount', 'Paid Amount:') !!}
    <p>{{ $advancePaymentDetail->paid_amount }}</p>
</div>

<!-- Remaining Amount Field -->
<div class="form-group">
    {!! Form::label('remaining_amount', 'Remaining Amount:') !!}
    <p>{{ $advancePaymentDetail->remaining_amount }}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{{ $advancePaymentDetail->payment_date }}</p>
</div>

