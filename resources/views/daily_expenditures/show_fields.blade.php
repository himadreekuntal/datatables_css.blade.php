<!-- Expenditure Id Field -->
<div class="form-group">
    {!! Form::label('expenditure_id', 'Expenditure Id:') !!}
    <p>{{ $dailyExpenditure->expenditure_id }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $dailyExpenditure->amount }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $dailyExpenditure->date }}</p>
</div>

<!-- Reference Field -->
<div class="form-group">
    {!! Form::label('reference', 'Reference:') !!}
    <p>{{ $dailyExpenditure->reference }}</p>
</div>

