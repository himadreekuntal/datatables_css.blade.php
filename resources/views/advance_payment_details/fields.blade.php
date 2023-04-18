<!-- Advance Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('advance_id', 'Advance Id:') !!}
    {!! Form::number('advance_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Paid Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paid_amount', 'Paid Amount:') !!}
    {!! Form::text('paid_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Remaining Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remaining_amount', 'Remaining Amount:') !!}
    {!! Form::text('remaining_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::text('payment_date', null, ['class' => 'form-control','id'=>'payment_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#payment_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('advancePaymentDetails.index') }}" class="btn btn-light">Cancel</a>
</div>
