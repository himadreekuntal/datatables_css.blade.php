<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', __('Employee ID').':') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Advance Payment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('advance_payment', __('Advance Payment').':') !!}
    {!! Form::text('advance_payment', null, ['class' => 'form-control','readonly' =>'true']) !!}
</div>

<!-- Monthly Payment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monthly_payment', __('Monthly Payment').':') !!}
    {!! Form::text('monthly_payment', null, ['class' => 'form-control', 'readonly' =>'true']) !!}
</div>

<!-- Interest Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interest', __('Interest').':') !!}
    {!! Form::text('interest', null, ['class' => 'form-control']) !!}
</div>

<!-- Repayment Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repayment_time', __('Repayment Time(Months)').':') !!}
    {!! Form::text('repayment_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Loan Reason Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('loan_reason', __('Loan Reason').':') !!}
    <textarea name="loan_reason" id="loan_reason" cols="30" rows="10" class="form-control">{!! $advancePayment->loan_reason  !!}</textarea>
</div>



<!-- Approve Field -->
<div class="form-group col-sm-6">
    {!! Form::label('approve', __('Approve').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('approve', '0', null) !!}
        {!! Form::checkbox('approve', '1', null) !!} Yes
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('advancePayments.index') }}" class="btn btn-light">@lang('Cancel')</a>
</div>

@section('scripts')
    <script>
        $(document).on('change keyup blur','#interest',function(){
            calculateEMI();
        });

        $(document).on('change keyup blur','#repayment_time',function(){
            calculateEMI();
        });

        function calculateEMI(){
            interest = $('#interest').val();
            if (interest == 0){
                var p = $('#advance_payment').val();
                var n = $('#repayment_time').val();
                emi = p / n;
                $('#monthly_payment').val(emi.toFixed(2));
            }
            else{
                var p = $('#advance_payment').val();
                var n = $('#repayment_time').val();
                var r = interest /12/100;
                var emi ;
                emi = p * r * (Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1));
                $('#monthly_payment').val(emi.toFixed(2));
            }

        /*    var p = $('#advance_payment').val();
            var n = $('#repayment_time').val();
            var r = interest /12/100;
            var emi ;
            emi = p * r * (Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1));
            $('#monthly_payment').val(emi.toFixed(2));*/
        }
        $('#loan_reason').summernote({
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endsection
