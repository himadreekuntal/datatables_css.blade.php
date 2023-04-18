<!-- Expenditure Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expenditure_id', 'Expenditure Id:') !!}
    <select name="expenditure_id" id="expenditure_id" class="expenditure_id form-control">
        <option value=""></option>
        @foreach($expenditure as $r)
            <option  value="{!! $r->id !!}">{!! $r->expenditure !!}</option>
    @endforeach
    </select>
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','autocomplete'=>'off']) !!}
</div>



<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dailyExpenditures.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
<script>
 $('#date').datepicker({
                uiLibrary: 'bootstrap4',
                format: "dd-mm-yyyy",
                todayHighlight: true
            })

$(document).ready(function() {
    
  
    $('#expenditure_id').select2({
        placeholder: "Select an Expenditure",
         allowClear: true
    }); 
        
});
</script>
@endsection