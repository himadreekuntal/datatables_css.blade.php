<!-- Tax Id Field -->
<div class="form-group">
    {!! Form::label('tax_id', 'Tax Id:') !!}
    <p>{{ $taxDetail->tax_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $taxDetail->name }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $taxDetail->amount }}</p>
</div>

<!-- Tax Percentage Field -->
<div class="form-group">
    {!! Form::label('tax_percentage', 'Tax Percentage:') !!}
    <p>{{ $taxDetail->tax_percentage }}</p>
</div>

