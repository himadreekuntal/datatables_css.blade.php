<div class="table-responsive">
    <table class="table" id="expenditureLists-table">
        <thead>
            <tr>
                <th>Expenditure</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($expenditureLists as $expenditureList)
            <tr>
                       <td>{{ $expenditureList->expenditure }}</td>
                       <td class=" text-center">
                          
                           <div class='btn-group'>
                               <a href="{!! route('expenditureLists.show', [$expenditureList->id]) !!}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-success fa-eye"></i></a>&nbsp
                               <a href="{!! route('expenditureLists.edit', [$expenditureList->id]) !!}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                               <button class="btn btn-danger waves-effect" type="button" onclick="deleteExpenditure({{ $expenditureList->id }}) " data-toggle="tooltip6" title="Delete">
                                    <i class="fa fa-trash"> </i>
                                </button>
                        <form id="delete-form-{{$expenditureList->id}}" action="{{ route('expenditureLists.destroy',$expenditureList->id) }}" method="POST" style="display: none;">
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
    $('#expenditureLists-table').DataTable({
        "order": [],
    });
});

function deleteExpenditure(id) {
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
