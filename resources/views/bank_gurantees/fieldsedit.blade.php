<!-- Tender Id Field -->

<div class="form-group col-sm-6">
    {!! Form::label('tender_id', 'Tender Id:') !!}
    {!! Form::number('tender_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bg Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bg_date', 'Bg Date:') !!}
    {!! Form::text('bg_date', null, ['class' => 'form-control','id'=>'bg_date']) !!}
</div>

<!-- Bg No Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bg_no', 'Bg No:') !!}
    {!! Form::text('bg_no', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Bg Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bg_amount', 'Bg Amount:') !!}
    {!! Form::text('bg_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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



<div class="form-group col-sm-6">
    {!! Form::label('status1', 'Status:') !!}
    <select name="status1" id="status1" class="form-control">
        <option selected value="">Please Select One</option>
        <option value="0">Unpaid</option>
        <option value="1">Paid</option>
        <option value="2">Released</option>
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('bg1', 'BG:') !!}
    {!! Form::file('bg1', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::hidden('status', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    {!! Form::hidden('bg', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bankGurantees.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>
        $('#bg_date').datepicker({
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

        var sdate = $('#bg_date').val();
        var date = new Date(sdate);

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + "-" + month + "-" + year;


        document.getElementById('bg_date').value = today;



        var vdate = $('#validity').val();
        var date1 = new Date(vdate);

        var day1 = date1.getDate();
        var month1 = date1.getMonth() + 1;
        var year1 = date1.getFullYear();

        if (month1 < 10) month1 = "0" + month1;
        if (day1 < 10) day1 = "0" + day1;

        var today1 = day1 + "-" + month1 + "-" + year1;


        document.getElementById('validity').value = today1;

        $('#status1').on('change', function(){
            var status1 = $('#status1').val();
            //   console.log(status1);
            $('#status').val(status1);
        });

    </script>
@endsection
