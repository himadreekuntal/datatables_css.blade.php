<!-- Tax Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_id', 'Tax Id:') !!}
    {!! Form::number('tax_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Tax Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_percentage', 'Tax Percentage:') !!}
    {!! Form::text('tax_percentage', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('taxDetails.index') }}" class="btn btn-light">Cancel</a>
</div>
