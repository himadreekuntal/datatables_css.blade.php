<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $educationEmployee->employee_id }}</p>
</div>

<!-- Exam Name Field -->
<div class="form-group">
    {!! Form::label('exam_name', 'Exam Name:') !!}
    <p>{{ $educationEmployee->exam_name }}</p>
</div>

<!-- Division Field -->
<div class="form-group">
    {!! Form::label('division', 'Division:') !!}
    <p>{{ $educationEmployee->division }}</p>
</div>

<!-- Institute Field -->
<div class="form-group">
    {!! Form::label('institute', 'Institute:') !!}
    <p>{{ $educationEmployee->institute }}</p>
</div>

<!-- Passing Year Field -->
<div class="form-group">
    {!! Form::label('passing_year', 'Passing Year:') !!}
    <p>{{ $educationEmployee->passing_year }}</p>
</div>

<!-- Cgpa Field -->
<div class="form-group">
    {!! Form::label('cgpa', 'Cgpa:') !!}
    <p>{{ $educationEmployee->cgpa }}</p>
</div>

