<div class="table-responsive">
    <table class="table table-bordered" id="bankGurantees-table">
        <thead>
            <tr>
                <th>Tender Id</th>
                <th>Bg Date</th>
                <th>Bg No</th>
                <th>Bg Amount</th>
                <th>Bank Info</th>
                <th>Validity</th>
                <th>Status</th>
                <th>Document</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bankGurantees as $bankGurantee)
            <tr>
                       <td>{{ $bankGurantee->tender_id }}</td>
            <td>{{ $bankGurantee->bg_date }}</td>
            <td>{{ $bankGurantee->bg_no }}</td>
            <td>{{ $bankGurantee->bg_amount }}</td>
            <td>{{ $bankGurantee->bank_info }}</td>
            <td>{{ $bankGurantee->validity }}</td>
            <td>{{ $bankGurantee->status }}</td>
            <td><a href="{{asset('bg/' .$bankGurantee->bg)}}">{{ $bankGurantee->bg  }}</a></td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['bankGurantees.destroy', $bankGurantee->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('bankGurantees.show', [$bankGurantee->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('bankGurantees.edit', [$bankGurantee->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
            $('#bankGurantees-table').DataTable();
        });
    </script>
@endsection
