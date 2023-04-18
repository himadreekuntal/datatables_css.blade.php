<div class="table-responsive">
    <table class="table" id="advancePayments-table">
        <thead>
            <tr>
                <th>Employee Id</th>
        <th>Advance Payment</th>
        <th>Monthly Payment</th>
        <th>Interest</th>
        <th>Repayment Time</th>
        <th>Loan Reason</th>
        <th>Status</th>
        <th>Approve</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($advancePayments as $advancePayment)
            <tr>
                       <td>{{ $advancePayment->employee->first_name }} {{ $advancePayment->employee->last_name }}</td>
            <td>{{ $advancePayment->advance_payment }}</td>
            <td>{{ $advancePayment->monthly_payment }}</td>
            <td>{{ $advancePayment->interest }}</td>
            <td>{{ $advancePayment->repayment_time }}</td>
            <td>{{ $advancePayment->loan_reason }}</td>
            <td>{{ $advancePayment->status }}</td>
            <td>{{ $advancePayment->approve }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['advancePayments.destroy', $advancePayment->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('advancePayments.show', [$advancePayment->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('advancePayments.edit', [$advancePayment->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
