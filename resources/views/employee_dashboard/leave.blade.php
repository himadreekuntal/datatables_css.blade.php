@extends('employee_layouts.app')
@section('title')
    Employee Leaves
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Employee Leaves</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('employee.leaveCreate')}}" class="btn btn-primary form-btn">Employee Leave <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="employeeLeaves-table">
                            <thead>
                            <tr>
                                <th>Leave type</th>
                                <th>Description</th>
                                <th>Leave Remaining</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Total Days</th>
                                <th>Status</th>
                                <th>Documents</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($leave as $employeeLeave)
                                <tr>
                                    <td>{{ $employeeLeave->leave->leave_name }}</td>
                                    <td>{!! $employeeLeave->description  !!}  </td>
                                    <td>{{ $employeeLeave->leaves_remaining }}</td>
                                    <td>{{date('d-m-Y', strtotime($employeeLeave->from))}}</td>
                                    <td>{{date('d-m-Y', strtotime($employeeLeave->to))}}</td>
                                    <td>{{ $employeeLeave->total_days }}</td>
                                    @if($employeeLeave->status == 0)
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    @elseif($employeeLeave->status == 1)
                                        <td><span class="badge badge-success">Approved</span></td>
                                    @else
                                        <td><span class="badge badge-danger">Declined</span></td>
                                    @endif

                                    <td>{{ $employeeLeave->documents }}</td>
                                    <td class=" text-center">
                                        {!! Form::open(['route' => ['employeeLeaves.destroy', $employeeLeave->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            <a href="{!! route('employeeLeaves.show', [$employeeLeave->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                                            <a href="{!! route('employeeLeaves.edit', [$employeeLeave->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready( function () {
            $('#employeeLeaves-table').DataTable();

        });
    </script>
@endsection
