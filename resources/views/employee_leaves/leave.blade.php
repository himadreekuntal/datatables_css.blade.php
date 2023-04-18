@extends('hrm_layouts.app')
@section('title')
    Employee Leaves
@endsection
@section('content')
    <section class="section">

        <div class="section-body">
            <div class="card" style="margin-top: 50px;">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="page__heading m-0">Leave</h3>

                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'displayLeaveReport', 'enctype'=>'multipart/form-data']) !!}
                    @csrf
                    <div class="form-group col-sm-6">
                        {!! Form::label('emp_id', 'Employee Name:') !!}<br/>
                        <select name="emp_id" id="emp_id" class="employeeid form-control">
                            <option value="">Choose Employee</option>
                            @foreach($employee as $r)
                                <option value="{!! $r->id !!}">{!! $r->first_name !!} {!! $r->last_name !!}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('reports.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script>
       /* $('.employeeid').select2({
            placeholder: "Select an Employee",
            allowClear: true
        });*/


    </script>
@endsection
