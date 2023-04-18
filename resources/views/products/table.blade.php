<div class="table-responsive">

    <table class="table" id="products-table">
        <thead>
            <tr>

                <th>Name</th>
                <th>Product Description</th>
                <th>Image</th>
                <th>Qty</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Created Time</th>
                <th>Updated Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
                <tr>

                    <td width="20%">{{ $product->product }}</td>
                    <td  width="25%">Category: {{ $product->category->category }} <br>
                        Brand: {{ $product->brand->brand }} <br>
                        Origin: {{ $product->brand->origin }} <br>
                        Warranty: {{ $product->warranty }} <br>
                        Catalog: <a href="{{asset('product_catalog/' .$product->catalog)}}">Download</a>
                    </td>


                    <td width="5%"><img src="{{asset('product_images/' .$product->image)}}" width="100" height="100"></td>
                    <td width="5%">{{ $product->qty }}</td>

                    <td width="10%">{{ $product->buying_price }}</td>
                    <td width="10%">{{ $product->selling_price }}</td>
                    <td width="10%">{{ date('d-M-y', strtotime($product->created_at)) }}</td>
                    <td width="10%">{{ date('d-M-y', strtotime($product->updated_at)) }}</td>
                    <td width="5%"><input type="checkbox" data-id="{{ $product->id }}" name="status" class="js-switch" {{ $product->status == 1 ? 'checked' : '' }}></td>
                    <td class=" text-center">
                    <div class='btn-group'>

                            <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                            <a href="{{ route('addStock', [$product->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Add Stock"><i class="fa fa-upload"></i></a>&nbsp
                            <a href="{{ route('pdfProduct', [$product->id]) }}" class='btn btn btn-warning waves-effect' data-toggle="tooltip2" title="Download Product Report"><i class="fa fa-download"></i></a>&nbsp
                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteProduct({{ $product->id }}) " data-toggle="tooltip3" title="Delete">
                                <i class="fa fa-trash"> </i>
                            </button>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST" style="display: none;">
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
    $('#products-table').DataTable({
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
            let productId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('product.status') }}',
                data: {'status': status, 'id': productId},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                }
        });
    });
});

function deleteProduct(id) {
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
