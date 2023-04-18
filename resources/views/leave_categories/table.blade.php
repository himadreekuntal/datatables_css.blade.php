<div class="table-responsive">
    <table class="table" id="leaveCategories-table">
        <thead>
            <tr>
                <th>Leave Name</th>
        <th>Max Leave</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leaveCategories as $leaveCategory)
            <tr>
                       <td>{{ $leaveCategory->leave_name }}</td>
            <td>{{ $leaveCategory->max_leave }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['leaveCategories.destroy', $leaveCategory->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('leaveCategories.show', [$leaveCategory->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('leaveCategories.edit', [$leaveCategory->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
