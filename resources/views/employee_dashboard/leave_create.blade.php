@extends('employee_layouts.app')
@section('title')
    Create Employee Leave
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">Employee Leave</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('employeeLeaves.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                {!! Form::open(['route' => 'employee.leaveStore']) !!}
                                <div class="row">
                                    <!-- Employee Id Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('leave_type', 'Leave Type:') !!}
                                        <select name="leave_id" id="leave_id" class="form-control" data-actions-box="true" title="Choose one of the following..."  data-live-search="true" , data-done-button="true" data-width="fit">

                                              <option selected value="{{$leave->id}}">{{$leave->leave_name}}</option>

                                        </select>
                                    </div>

                                    <!-- Description Field -->
                                    <div class="form-group col-sm-12 col-lg-12">
                                        <input type="hidden" class="form-control employee_id" id="employee_id" name="employee_id" value="{{$emp_id}}">
                                        {!! Form::label('description', 'Description:') !!}
                                        <textarea class="form-control description" id="description" name="description"></textarea>
                                    </div>



                                    <!-- From Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('from', 'From:') !!}
                                        {!! Form::text('from', null, ['class' => 'form-control','id'=>'from']) !!}
                                    </div>


                                    <!-- To Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('to', 'To:') !!}
                                        {!! Form::text('to', null, ['class' => 'form-control','id'=>'to']) !!}
                                    </div>

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('total_days', 'Total days:') !!}
                                        <input type="text" class="form-control" id="total_days" name="total_days" readonly>

                                    </div>

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('total_days_remaining', 'Total Leaves Remaining:') !!}
                                        <input type="text" class="form-control" id="days_remaining" name="days_remaining" value="{{ $leaveR }}" readonly>

                                    </div>

                                    <!-- Documents Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('documents', 'Documents:') !!}
                                        {!! Form::file('documents', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                                    </div>

                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('employeeLeaves.index') }}" class="btn btn-light">Cancel</a>
                                    </div>

                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('#from').datepicker({
            uiLibrary: 'bootstrap4',
            format: "mm/dd/yyyy",
            todayHighlight: true
        });

        $('#to').datepicker({
            uiLibrary: 'bootstrap4',
            format: "mm/dd/yyyy",
            todayHighlight: true
        });
        $('.description').summernote({
            height: 200
        });

        $('#to').on('change', function () {
           var from = $('#from').val();
           var to =   $(this).val();

            var date1 = new Date(from);
            var date2 = new Date(to);


            var Difference_In_Time = date2.getTime() - date1.getTime();

            // To calculate the no. of days between two dates
            var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

            var diff = Difference_In_Time / (1000 * 3600 * 24);
            $('#total_days').val(diff);

        });
    </script>
@endsection
