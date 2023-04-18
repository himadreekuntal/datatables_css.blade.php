<!-- Etender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etender_id', 'Tender ID:') !!}
    {!! Form::text('etender_id', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Procuring Entity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('procuring_entity', 'Procuring Entity:') !!}
    {!! Form::text('procuring_entity', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Item Field -->
<div class="form-group col-sm-12">
    {!! Form::label('item', 'Item:') !!}
    {!! Form::textarea('item', null, ['class' => 'form-control','rows' => 2, 'cols' => 40]) !!}
</div>

<!-- Tender Status Field -->


<!-- Opening Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('opening_date', 'Opening Date:') !!}
    {!! Form::text('opening_date', null, ['class' => 'form-control','id'=>'opening_date']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tenders.index') }}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
    <script>
        $('#opening_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });

        $(document).ready(function() {
            $('#item').summernote({
                height: 250,
            });
        });

        var sdate = $('#opening_date').val();
        var date = new Date(sdate);

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + "-" + month + "-" + year;


        document.getElementById('opening_date').value = today;

    </script>
@endsection
