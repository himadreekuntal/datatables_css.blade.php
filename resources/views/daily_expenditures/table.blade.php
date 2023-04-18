<div class="table-responsive">
    <table class="table" id="dailyExpenditures-table">
        <thead>
            <tr>
                <th>Expenditure Id</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Reference</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dailyExpenditures as $dailyExpenditure)
            <tr>
                       <td>{{ $dailyExpenditure->expenditure->expenditure }}</td>
            <td>{{ $dailyExpenditure->amount }}</td>
            <td>{{date('d-m-Y', strtotime($dailyExpenditure->date))}}</td>
            <td>{{ $dailyExpenditure->reference }}</td>
                       <td class=" text-center">
                          
                           <div class='btn-group'>
                               <a href="{!! route('dailyExpenditures.show', [$dailyExpenditure->id]) !!}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-success fa-eye"></i></a>&nbsp
                               <a href="{!! route('dailyExpenditures.edit', [$dailyExpenditure->id]) !!}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                               <button class="btn btn-danger waves-effect" type="button" onclick="deleteDailyExpenditure({{ $dailyExpenditure->id }}) " data-toggle="tooltip6" title="Delete">
                                    <i class="fa fa-trash"> </i>
                                </button>
                        <form id="delete-form-{{$dailyExpenditure->id}}" action="{{ route('dailyExpenditures.destroy',$dailyExpenditure->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                               
                           </div>
                         
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')

<script>    
$(document).ready( function (){
    $('#dailyExpenditures-table').DataTable({
        "order": [],
    });
});

function deleteDailyExpenditure(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: ' No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>


@endsection
