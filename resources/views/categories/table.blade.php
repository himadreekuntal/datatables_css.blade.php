<div class="table-responsive">

    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                       <td>{{ $category->category }}</td>
                       <td><input type="checkbox" data-id="{{ $category->id }}" name="status" class="js-switch" {{ $category->status == 1 ? 'checked' : '' }}></td>
                       <td class=" text-center">
                         
                       <div class='btn-group'>
                            <a href="{{ route('categories.show', [$category->id]) }}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>&nbsp    
                            <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteCategory({{ $category->id }}) " data-toggle="tooltip2" title="Delete">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy',$category->id) }}" method="POST" style="display: none;">
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
    $(document).ready( function () {
    $('#categories-table').DataTable({
        "order": [],
    });
});

    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $(document).ready(function(){
            $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let categoryId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('category.status') }}',
                data: {'status': status, 'id': categoryId},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                }
        });
    });
});
function deleteCategory(id) {
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
       
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
            $('[data-toggle="tooltip1"]').tooltip();   
            $('[data-toggle="tooltip2"]').tooltip();           

         });

    </script>
@endsection

