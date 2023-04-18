<div class="table-responsive">
    <table class="table table-bordered" id="customerEmailDetails-table">
        <thead>
            <tr>
                <th>Email Id</th>
        <th>Customer Name</th>
        <th>Customer Company</th>
        <th>Customer Email</th>
        <th>Customer Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customerEmailDetails as $customerEmailDetail)
            <tr>
                       <td>{{ $customerEmailDetail->email->category }}</td>
            <td>{{ $customerEmailDetail->customer_name }}</td>
            <td>{{ $customerEmailDetail->customer_company }}</td>
            <td>{{ $customerEmailDetail->customer_email }}</td>
            <td>{{ $customerEmailDetail->customer_phone }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['customerEmailDetails.destroy', $customerEmailDetail->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('customerEmailDetails.show', [$customerEmailDetail->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('customerEmailDetails.edit', [$customerEmailDetail->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#customerEmailDetails-table').DataTable();
        });
    </script>
@endsection

