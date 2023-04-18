<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
            <tr>
                <th>Employee's Name</th>
                <th>Rfid</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->rfid }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->designation->department->department }}</td>
                    <td>{{ $employee->designation->designation }}</td>
                    <td>{{ $employee->image }}</td>
                    <td>{{ $employee->status }}</td>
                    <td class=" text-center">
                       {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                       <div class='btn-group'>
                           <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-light waves-effect'><i class="fa fa-eye"></i></a> &nbsp;
                           <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-warning waves-effect edit-btn'><i class="fa fa-edit"></i></a> &nbsp;
                           {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger waves-effect delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
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
        $('#employees-table').DataTable();
    </script>
@endsection
