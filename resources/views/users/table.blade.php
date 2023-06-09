<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
      
        <th>Password</th>
        <th>Roles</th>
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $user)
            <tr>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
          
                        <td>{{ $user->password }}</td>
                      
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
