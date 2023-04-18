<div class="table-responsive">
    <table class="table table-bordered" id="employeeLeaves-table">
        <thead>
            <tr>
                <th>Employee Details</th>
                <th>Leave Type</th>
                <th>Description</th>
                <th>Leave Remaining</th>
                <th>Time Range</th>
                <th>Total days</th>
                <th>Status</th>
                <th>Documents</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employeeLeaves as $employeeLeave)
            <tr>
                       <td>Employee Name: {{ $employeeLeave->employee->first_name }}  {{ $employeeLeave->employee->last_name }}
                           <br>Department: {{ $employeeLeave->employee->designation->department->department }}<br>
                               Designation: {{ $employeeLeave->employee->designation->designation }}</td>
                <td>{{ $employeeLeave->leave->leave_name }}</td>
            <td>{!! $employeeLeave->description !!}  </td>

                <td> {{ $employeeLeave->leaves_remaining }} </td>
                <td>{{date('d-m-Y', strtotime($employeeLeave->from))}} to {{date('d-m-Y', strtotime($employeeLeave->to))}} </td>
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
                               <a href="{!! route('employeeLeaves.show', [$employeeLeave->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a> &nbsp;
                               <a href="{!! route('approve', [$employeeLeave->id]) !!}" class='btn btn-primary action-btn '><i class="fa fa-thumbs-up"></i></a>&nbsp;
                               <a href="{!! route('disapprove', [$employeeLeave->id]) !!}" class='btn btn-danger action-btn '><i class="fa fa-thumbs-down"></i></a>&nbsp;
                               <a href="{!! route('employeeLeaves.edit', [$employeeLeave->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>&nbsp;
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
    <script>
        $(document).ready( function () {
            $('#employeeLeaves-table').DataTable();

        });
    </script>
@endsection
