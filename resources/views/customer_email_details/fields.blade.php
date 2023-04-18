<!-- Email Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_id', 'Category:') !!}
    <select name="email_id" id="email_id" class="email_id form-control">
        @foreach($customerEmail as $key3 => $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
        @endforeach
    </select>
</div>

<!-- Customer Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Customer Name:') !!}
    {!! Form::text('customer_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Customer Company Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_company', 'Customer Company:') !!}
    {!! Form::text('customer_company', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Customer Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_email', 'Customer Email:') !!}
    {!! Form::text('customer_email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Customer Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_phone', 'Customer Phone:') !!}
    {!! Form::text('customer_phone', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('customerEmailDetails.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.email_id').select2({
                placeholder: "Select a Payment Process",
                allowClear: true
            });
        });
    </script>
@endsection

