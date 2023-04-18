<div class="table-responsive">
    <table class="table" id="bankTransactions-table">
        <thead>
            <tr>
                <th>Date</th>
        <th>Amount</th>
        <th>Reference</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bankTransactions as $bankTransaction)
            <tr>
                       <td>{{ $bankTransaction->date }}</td>
            <td>{{ $bankTransaction->amount }}</td>
            <td>{{ $bankTransaction->reference }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['bankTransactions.destroy', $bankTransaction->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('bankTransactions.show', [$bankTransaction->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('bankTransactions.edit', [$bankTransaction->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
