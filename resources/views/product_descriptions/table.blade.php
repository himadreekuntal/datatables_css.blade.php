<div class="table-responsive">
    <table class="table table-bordered" id="productDescriptions-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Image</th>
                <th>Catalog</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productDescriptions as $productDescription)
            <tr>

                <td>{{ $productDescription->product_name }}</td>
                <td>{{ $productDescription->category->category }}</td>
            <td>{{ $productDescription->description }}</td>
               <td><img src="{{asset('product_details/' .$productDescription->product_image)}}" width="100" height="100"></td>
                <td><a href="{{asset('product_details/' .$productDescription->product_catalog)}}">{{$productDescription->product_catalog}}</a></td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['productDescriptions.destroy', $productDescription->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('productDescriptions.show', [$productDescription->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('productDescriptions.edit', [$productDescription->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
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
            $('#productDescriptions-table').DataTable();
        });
    </script>
@endsection
