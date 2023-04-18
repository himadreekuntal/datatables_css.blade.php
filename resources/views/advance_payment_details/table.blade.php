<div class="table-responsive">
    <table class="table" id="advancePaymentDetails-table">
        <thead>
            <tr>
                <th>Advance Id</th>
        <th>Paid Amount</th>
        <th>Remaining Amount</th>
        <th>Payment Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($advancePaymentDetails as $advancePaymentDetail)
            <tr>
                       <td>{{ $advancePaymentDetail->advance_id }}</td>
            <td>{{ $advancePaymentDetail->paid_amount }}</td>
            <td>{{ $advancePaymentDetail->remaining_amount }}</td>
            <td>{{ $advancePaymentDetail->payment_date }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['advancePaymentDetails.destroy', $advancePaymentDetail->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('advancePaymentDetails.show', [$advancePaymentDetail->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('advancePaymentDetails.edit', [$advancePaymentDetail->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
