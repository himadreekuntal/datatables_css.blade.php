<!-- Tender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tender_id', 'Tender Id:') !!}
    {!! Form::number('tender_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Pg Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pg_date', 'Pg Date:') !!}
    {!! Form::text('pg_date', null, ['class' => 'form-control','id'=>'pg_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#pg_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Pg No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pg_no', 'Pg No:') !!}
    {!! Form::text('pg_no', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Pg Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pg_amount', 'Pg Amount:') !!}
    {!! Form::text('pg_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Bank Info Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_info', 'Bank Info:') !!}
    {!! Form::text('bank_info', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Validity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validity', 'Validity:') !!}
    {!! Form::text('validity', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('performanceGurantees.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>
        $('#pg_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });

        $('#validity').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });

        $(document).ready(function() {
            $('#item').summernote({
                height: 250,
            });
        });

        var sdate = $('#pg_date').val();
        var date = new Date(sdate);

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + "-" + month + "-" + year;


        document.getElementById('pg_date').value = today;



        var vdate = $('#validity').val();
        var date1 = new Date(vdate);

        var day1 = date1.getDate();
        var month1 = date1.getMonth() + 1;
        var year1 = date1.getFullYear();

        if (month1 < 10) month1 = "0" + month1;
        if (day1 < 10) day1 = "0" + day1;

        var today1 = day1 + "-" + month1 + "-" + year1;


        document.getElementById('validity').value = today1;

    </script>
@endsection
