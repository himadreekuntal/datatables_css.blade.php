<!-- Tender Id Field -->
<div class="form-group">
    {!! Form::label('tender_id', 'Tender Id:') !!}
    <p>{{ $bankGurantee->tender_id }}</p>
</div>

<!-- Bg Date Field -->
<div class="form-group">
    {!! Form::label('bg_date', 'Bg Date:') !!}
    <p>{{ $bankGurantee->bg_date }}</p>
</div>

<!-- Bg No Field -->
<div class="form-group">
    {!! Form::label('bg_no', 'Bg No:') !!}
    <p>{{ $bankGurantee->bg_no }}</p>
</div>

<!-- Bg Amount Field -->
<div class="form-group">
    {!! Form::label('bg_amount', 'Bg Amount:') !!}
    <p>{{ $bankGurantee->bg_amount }}</p>
</div>

<!-- Bank Info Field -->
<div class="form-group">
    {!! Form::label('bank_info', 'Bank Info:') !!}
    <p>{{ $bankGurantee->bank_info }}</p>
</div>

<!-- Validity Field -->
<div class="form-group">
    {!! Form::label('validity', 'Validity:') !!}
    <p>{{ $bankGurantee->validity }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $bankGurantee->status }}</p>
</div>

