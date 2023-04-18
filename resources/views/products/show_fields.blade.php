<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $product->category_id }}</p>
</div>

<!-- Brand Id Field -->
<div class="form-group">
    {!! Form::label('brand_id', 'Brand Id:') !!}
    <p>{{ $product->brand_id }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $product->image }}</p>
</div>

<!-- Catalog Field -->
<div class="form-group">
    {!! Form::label('catalog', 'Catalog:') !!}
    <p>{{ $product->catalog }}</p>
</div>

<!-- Qty Field -->
<div class="form-group">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $product->qty }}</p>
</div>

<!-- Warranty Field -->
<div class="form-group">
    {!! Form::label('warranty', 'Warranty:') !!}
    <p>{{ $product->warranty }}</p>
</div>

<!-- Buying Price Field -->
<div class="form-group">
    {!! Form::label('buying_price', 'Buying Price:') !!}
    <p>{{ $product->buying_price }}</p>
</div>

<!-- Selling Price Field -->
<div class="form-group">
    {!! Form::label('selling_price', 'Selling Price:') !!}
    <p>{{ $product->selling_price }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $product->status }}</p>
</div>

