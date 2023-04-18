<div class="table-responsive">
    <table class="table" id="cashHands-table">
        <thead>
            <tr>
                <th>Date</th>
        <th>Amount</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cashHands as $cashHand)
            <tr>
                       <td>{{ $cashHand->date }}</td>
            <td>{{ $cashHand->amount }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['cashHands.destroy', $cashHand->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('cashHands.show', [$cashHand->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('cashHands.edit', [$cashHand->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
