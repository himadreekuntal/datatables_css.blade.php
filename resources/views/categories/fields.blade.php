<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
<br>
    {!! Form::label('status', 'Status:') !!}
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
       

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-light">Cancel</a>
</div>
