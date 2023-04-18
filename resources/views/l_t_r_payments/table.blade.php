<div class="table-responsive">
    <table class="table" id="lTRPayments-table">
        <thead>
            <tr>
                <th>Lc Id</th>
        <th>Payment Date</th>
        <th>Payment Amount</th>
        <th>Payment Remaining</th>
        <th>Bank Statement Ap</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lTRPayments as $lTRPayment)
            <tr>
                       <td>{{ $lTRPayment->lc_id }}</td>
            <td>{{ $lTRPayment->payment_date }}</td>
            <td>{{ number_format($lTRPayment->payment_amount, 2, '.', ',') }}</td>
            <td>{{ number_format($lTRPayment->payment_remaining, 2, '.', ',') }}</td>
            <td><a href="{{asset('lc_document/' .$lTRPayment->bank_statement_ap )}}">{{ $lTRPayment->bank_statement_ap }}</a> </td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['lTRPayments.destroy', $lTRPayment->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('lTRPayments.show', [$lTRPayment->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <!-- <a href="{!! route('lTRPayments.edit', [$lTRPayment->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a> -->
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
