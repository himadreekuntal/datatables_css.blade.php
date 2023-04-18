<div class="table-responsive">
    <table class="table" id="taxes-table">
        <thead>
            <tr>
                <th>Criteria</th>
        <th>Age Limit</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($taxes as $tax)
            <tr>
                       <td>{{ $tax->criteria }}</td>
            <td>{{ $tax->age_limit }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['taxes.destroy', $tax->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('taxes.show', [$tax->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('taxes.edit', [$tax->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
