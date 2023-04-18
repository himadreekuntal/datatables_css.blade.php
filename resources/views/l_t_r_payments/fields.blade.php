<!-- Lc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lc_id', 'Lc Id:') !!}
    {!! Form::number('lc_id', $lc_id ,['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('ltr_amount', 'LTR Amount:') !!}
    {!! Form::text('ltr_amount', $ltr_amount ,['class' => 'form-control']) !!}
</div>


<!-- Payment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_date', 'Payment Date:') !!}
    {!! Form::text('payment_date', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payment Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_amount', 'Amount Paid:') !!}
    {!! Form::text('payment_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payment Remaining Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_remaining', 'Payment Remaining:') !!}
    {!! Form::text('payment_remaining', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'readonly']) !!}
</div>

<!-- Bank Statement Ap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_statement_ap', 'Bank Statement Ap:') !!}
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="bank_statement_ap"></span>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lTRPayments.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
<script>
 $('#payment_date').datepicker({
                uiLibrary: 'bootstrap4',
                format: "dd-mm-yyyy",
                todayHighlight: true
            })
$(document).on('change keyup blur','#payment_amount',function(){
    calculateRemaining();
});

function calculateRemaining(){
        ltr = $('#ltr_amount').val();
        paid = $('#payment_amount').val();
        remainingAmount = ltr - paid;
        $('#payment_remaining').val(remainingAmount.toFixed(2));
    }

</script>
@endsection