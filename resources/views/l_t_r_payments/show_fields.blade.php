<!-- Lc Id Field -->
<div class="form-group">
    {!! Form::label('lc_id', 'Lc Id:') !!}
    <p>{{ $lTRPayment->lc_id }}</p>
</div>

<!-- Payment Date Field -->
<div class="form-group">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    <p>{{ $lTRPayment->payment_date }}</p>
</div>

<!-- Payment Amount Field -->
<div class="form-group">
    {!! Form::label('payment_amount', 'Payment Amount:') !!}
    <p>{{ $lTRPayment->payment_amount }}</p>
</div>

<!-- Payment Remaining Field -->
<div class="form-group">
    {!! Form::label('payment_remaining', 'Payment Remaining:') !!}
    <p>{{ $lTRPayment->payment_remaining }}</p>
</div>

<!-- Bank Statement Ap Field -->
<div class="form-group">
    {!! Form::label('bank_statement_ap', 'Bank Statement Ap:') !!}
    <p>{{ $lTRPayment->bank_statement_ap }}</p>
</div>

