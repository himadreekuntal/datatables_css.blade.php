<!-- Employee Id Field -->
<div class="form-group">
    {!! Form::label('employee_id', 'Employee Id:') !!}
    <p>{{ $employeeLeave->employee_id }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $employeeLeave->description }}</p>
</div>

<!-- From Field -->
<div class="form-group">
    {!! Form::label('from', 'From:') !!}
    <p>{{ $employeeLeave->from }}</p>
</div>

<!-- To Field -->
<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    <p>{{ $employeeLeave->to }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $employeeLeave->status }}</p>
</div>

<!-- Documents Field -->
<div class="form-group">
    {!! Form::label('documents', 'Documents:') !!}
    <p>{{ $employeeLeave->documents }}</p>
</div>

