<div class="table-responsive">


    <table class="table" id="brands-table">
        <thead>
            <tr>
                <th>Brand</th>
        <th>Origin</th>
        <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                       <td>{{ $brand->brand }}</td>
            <td>{{ $brand->origin }}</td>
            <td><input type="checkbox" data-id="{{ $brand->id }}" name="status" class="js-switch" {{ $brand->status == 1 ? 'checked' : '' }}></td>
                       <td class=" text-center">
                          
                        <div class='btn-group'>
                            <a href="{{ route('brands.show', [$brand->id]) }}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>&nbsp
                            <a href="{{ route('brands.edit', [$brand->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteBrand({{ $brand->id }}) " data-toggle="tooltip2" title="Delete">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="delete-form-{{ $brand->id }}" action="{{ route('brands.destroy',$brand->id) }}" method="POST" style="display: none;">
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
    $('#brands-table').DataTable({
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
    let brandId = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('brand.status') }}',
        data: {'status': status, 'id': brandId},
        success: function (data) {
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
});
});
});

function deleteBrand(id) {
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

