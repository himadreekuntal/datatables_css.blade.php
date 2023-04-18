<div class="table-responsive">
    <table class="table" id="taxDetails-table">
        <thead>
            <tr>
                <th>Tax Id</th>
        <th>Name</th>
        <th>Amount</th>
        <th>Tax Percentage</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($taxDetails as $taxDetail)
            <tr>
                       <td>{{ $taxDetail->tax_id }}</td>
            <td>{{ $taxDetail->name }}</td>
            <td>{{ $taxDetail->amount }}</td>
            <td>{{ $taxDetail->tax_percentage }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['taxDetails.destroy', $taxDetail->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('taxDetails.show', [$taxDetail->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('taxDetails.edit', [$taxDetail->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
