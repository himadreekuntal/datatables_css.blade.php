<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>   
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($roles as $key => $role)
            <tr>
                       <td>{{ ++$i }}</td>
                       <td>{{ $role->name }}</td>             
                      
                        
                       <td class=" text-center">
                           {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                           
                               <a href="{!! route('roles.show', [$role->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               @can('role-edit')
                                 <a href="{!! route('roles.edit', [$role->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               @endcan

                               @can('role-delete')
                                 {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                               @endcan
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
