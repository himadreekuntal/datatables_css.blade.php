<!-- Leave Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('leave_name', 'Leave Name:') !!}
    {!! Form::text('leave_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Max Leave Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_leave', 'Max Leave:') !!}
    {!! Form::text('max_leave', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('leaveCategories.index') }}" class="btn btn-light">Cancel</a>
</div>
