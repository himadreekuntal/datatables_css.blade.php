<div class="table-responsive">
    <table class="table table-bordered" id="performanceGurantees-table">
        <thead>
            <tr>
                <th>Tender Id</th>
        <th>Pg Date</th>
        <th>Pg No</th>
        <th>Pg Amount</th>
        <th>Bank Info</th>
        <th>Validity</th>
        <th>Status</th>
                <th>NOA</th>
                <th>PG</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($performanceGurantees as $performanceGurantee)
            <tr>
                       <td>{{ $performanceGurantee->tender_id }}</td>
            <td>{{ $performanceGurantee->pg_date }}</td>
            <td>{{ $performanceGurantee->pg_no }}</td>
            <td>{{ $performanceGurantee->pg_amount }}</td>
            <td>{{ $performanceGurantee->bank_info }}</td>
            <td>{{ $performanceGurantee->validity }}</td>
            <td>{{ $performanceGurantee->status }}</td>
                <td><a href="{{asset('bg/' .$performanceGurantee->noa)}}">{{ $performanceGurantee->noa  }}</a></td>
                <td><a href="{{asset('bg/' .$performanceGurantee->pg)}}">{{ $performanceGurantee->pg  }}</a></td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['performanceGurantees.destroy', $performanceGurantee->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('performanceGurantees.show', [$performanceGurantee->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('performanceGurantees.edit', [$performanceGurantee->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
            $('#performanceGurantees-table').DataTable();
        });
    </script>
@endsection
