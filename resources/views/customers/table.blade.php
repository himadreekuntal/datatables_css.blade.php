<div class="table-responsive">
    <table class="table" id="customers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
            <td><input type="checkbox" data-id="{{ $customer->id }}" name="status" class="js-switch" {{ $customer->status == 1 ? 'checked' : '' }}></td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                            <a href="{{ route('customers.show', [$customer->id]) }}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-eye"></i></a>&nbsp
                            <a href="{{ route('customers.edit', [$customer->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                            <a href="{{ route('pdfCustomer', [$customer->id]) }}" class='btn btn btn-warning waves-effect' data-toggle="tooltip2" title="Download Cutomer Report"><i class="fa fa-download"></i></a>&nbsp
                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteCustomer({{ $customer->id }}) " data-toggle="tooltip3" title="Delete">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="delete-form-{{ $customer->id }}" action="{{ route('customers.destroy',$customer->id) }}" method="POST" style="display: none;">
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
        $('#customers-table').DataTable({
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
    let customerId = $(this).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('customer.status') }}',
        data: {'status': status, 'id': customerId},
        success: function (data) {
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
});
});
});

function deleteCustomer(id) {
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
            $('[data-toggle="tooltip3"]').tooltip();

         });
    </script>


@endsection

