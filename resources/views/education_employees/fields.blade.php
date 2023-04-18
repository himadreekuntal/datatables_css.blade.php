<!-- Employee Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    {!! Form::number('employee_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Exam Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exam_name', 'Exam Name:') !!}
    {!! Form::text('exam_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Division Field -->
<div class="form-group col-sm-6">
    {!! Form::label('division', 'Division:') !!}
    {!! Form::text('division', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Institute Field -->
<div class="form-group col-sm-6">
    {!! Form::label('institute', 'Institute:') !!}
    {!! Form::text('institute', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Passing Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passing_year', 'Passing Year:') !!}
    {!! Form::text('passing_year', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cgpa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cgpa', 'Cgpa:') !!}
    {!! Form::text('cgpa', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('educationEmployees.index') }}" class="btn btn-light">Cancel</a>
</div>
