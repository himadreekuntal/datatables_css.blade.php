<div class="table-responsive">
    <table class="table" id="departments-table">
        <thead>
            <tr>
                <th>Department</th>
        <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                       <td>{{ $department->department }}</td>
              <td> <input type="checkbox" data-id="{{ $department->id }}" name="status" class="js-switch" {{ $department->status == 1 ? 'checked' : '' }}></td>
                       <td class=" text-center">

                           <div class='btn-group'>
                               <a href="{!! route('departments.show', [$department->id]) !!}" class='btn btn-light waves-effect'><i class="fa fa-eye"></i></a>&nbsp
                               <a href="{!! route('departments.edit', [$department->id]) !!}" class='btn btn-warning waves-effect'><i class="fa fa-edit"></i></a>&nbsp
                               <button class="btn btn-danger waves-effect" type="button" onclick="deleteDepartment({{ $department->id }}) " data-toggle="tooltip2" title="Delete">
                                   <i class="fa fa-trash"> </i>
                               </button>
                               <form id="delete-form-{{ $department->id }}" action="{{ route('departments.destroy',$department->id) }}" method="POST" style="display: none;">
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
            $('#departments-table').DataTable({

            });
        });

        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });

        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let departmentId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('department.status') }}',
                    data: {'status': status, 'id': departmentId},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });
        function deleteDepartment(id) {
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

