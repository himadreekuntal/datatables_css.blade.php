<!-- Name Field -->
<style>

    .img-thumbnail {  border: 2px solid lightblue; }


    img{
        max-width:180px;
        max-height:200px;
    }
    .img-thumbnail{
        margin-top:40px;

    }
    </style>
<div class="row">
    <div class="col-md-4">
        <div class="form-group col-md-12">
            <img id="output_image" src="{{asset('product_images/' .$product->image)}}" class="img-thumbnail" alt="your image" />
            <input type="hidden" class="form-control" name="image_name" value="{{$product->image}}">
            <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="image/*" name="image" onchange="preview_image(event)"></span>

        </div>

        <div class="form-group col-md-12">
            {{-- <iframe id="output_doc" #toolbar=0 width="100%" height="300px" class="doc-thumbnail" alt="your image">
            </iframe> --}}
            {{-- <span class="btn btn-success"> Browse Catalog  <input type="file" accept="pdf/*" name="document" onchange="preview_doc(event)"></span> --}}

        </div>
    </div>

    <div class="col-md-8">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('product', 'Name:') !!}
                {!! Form::text('product', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Category Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('category_id', 'Category:') !!}<br/>
                {!! Form::select('category_id', App\Models\Category::pluck('category','id'), null, ['class' => 'selectpicker form-control', 'data-actions-box' => 'true',  'data-live-search' => 'true' , 'data-done-button' => 'true' , 'data-width' => 'fit' ]) !!}
              
            </div>
        </div>
        <div class="row">
            <!-- Brand Id Field -->
            <div class="form-group col-sm-5">
                {!! Form::label('brand_id', 'Brand Id:') !!}<br/>
                {!! Form::select('brand_id', App\Models\Brand::pluck('brand','id'), null, ['class' => 'selectpicker form-control', 'data-actions-box' => 'true',  'data-live-search' => 'true' , 'data-done-button' => 'true' , 'data-width' => 'fit' ]) !!}
            </div>


        <!-- Image Field -->



        <!-- Qty Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('qty', 'Quantity:') !!}
                {!! Form::text('qty', null, ['class' => 'form-control']) !!}
            </div>



            <!-- Warranty Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('warranty', 'Warranty:') !!}
                {!! Form::text('warranty', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">

            <!-- Buying Price Field -->
            <div class="form-group col-sm-5">
                {!! Form::label('buying_price', 'Buying Price:') !!}
                {!! Form::text('buying_price', null, ['class' => 'form-control']) !!}
            </div>


            <!-- Selling Price Field -->
            <div class="form-group col-sm-5">
                {!! Form::label('selling_price', 'Selling Price:') !!}
                {!! Form::text('selling_price', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-sm-6">
                
                    <input type="test" name="product_catalog" value="{{ $product->catalog }}" hidden>
                <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="catalog" onchange="preview_doc(event)"></span>

            </div>

          <!-- Status Field -->
            <div class="form-group col-sm-2">

                    {!! Form::label('status', 'Status:') !!}
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', '1', null) !!}

            </div>
        </div>
        <!-- Submit Field -->
        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>





@section('scripts')
<script>
    function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
                {
                var output = document.getElementById('output_image');
                output.src = reader.result;
                }
            reader.readAsDataURL(event.target.files[0]);
            }

    function preview_doc(event)
        {
            var reader = new FileReader();
            reader.onload = function()
                {
                var output = document.getElementById('output_doc');
                output.src = reader.result;
                }
            reader.readAsDataURL(event.target.files[0]);
            }



    $(document).ready(function() {
        $('#category_id').select2({
            placeholder: "Select a Category",
            allowClear: true
        });
    });

    $(document).ready(function() {
        $('#brand_id').select2({
            placeholder: "Select a Brand",
            allowClear: true
        });
    });
</script>
@endsection
