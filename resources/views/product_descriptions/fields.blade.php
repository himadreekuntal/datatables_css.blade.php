<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
    <select name="category_id" id="categoryId" class="category_id form-control">
        <option value=""></option>
        @foreach($category as $r)
            <option  value="{!! $r->id !!}">{!! $r->category !!}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 2, 'cols' => 40]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('product_image', 'Product Image:') !!}
    {!! Form::file('product_image', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('product_catalog', 'Product Catalog:') !!}
    {!! Form::file('product_catalog', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productDescriptions.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>

        $(document).ready(function() {
            $('#description').summernote({
                height: 250,
            });
            $('#categoryId').select2({
                placeholder: "Select a Category",
                allowClear: true
            });
        });
    </script>
@endsection
