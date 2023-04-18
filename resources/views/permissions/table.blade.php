<div class="table-responsive">
    <table class="table" id="permissions-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Guard Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                       <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('permissions.show', [$permission->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('permissions.edit', [$permission->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
            $('#permissions-table').DataTable({

            });
        });
    </script>
@endsection

