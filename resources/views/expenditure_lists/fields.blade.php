<!-- Expenditure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expenditure', 'Expenditure:') !!}
    {!! Form::text('expenditure', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('expenditureLists.index') }}" class="btn btn-light">Cancel</a>
</div>
