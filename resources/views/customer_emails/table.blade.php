<div class="table-responsive">
    <table class="table table-bordered" id="customerEmails-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Total Industry</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customerEmails as $customerEmail)
            <tr>
                       <td>{{ $customerEmail->category }}</td>
                       <td>{{ $customerEmail->total_industry }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['customerEmails.destroy', $customerEmail->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('customerEmails.show', [$customerEmail->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('customerEmails.edit', [$customerEmail->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               <a href="{!! route('email', [$customerEmail->id]) !!}" class='btn btn-primary action-btn edit-btn'><i class="fa fa-envelope"></i></a>
                               <a href="{!! route('sms', [$customerEmail->id]) !!}" class='btn btn-success action-btn edit-btn'><i class="fa fa-comments"></i></a>
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
            $('#customerEmails-table').DataTable();
        });
    </script>
@endsection

