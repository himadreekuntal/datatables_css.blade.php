<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission', 'Permission:') !!}
    @foreach($permission as $value)
        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
        {{ $value->name }}</label>
        <br/>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roles.index') }}" class="btn btn-light">Cancel</a>
</div>
