<!-- Etender Id Field -->
<div class="form-group">
    {!! Form::label('etender_id', 'Etender Id:') !!}
    <p>{{ $tender->etender_id }}</p>
</div>

<!-- Procuring Entity Field -->
<div class="form-group">
    {!! Form::label('procuring_entity', 'Procuring Entity:') !!}
    <p>{{ $tender->procuring_entity }}</p>
</div>

<!-- Item Field -->
<div class="form-group">
    {!! Form::label('item', 'Item:') !!}
    <p>{{ $tender->item }}</p>
</div>

<!-- Tender Status Field -->
<div class="form-group">
    {!! Form::label('tender_status', 'Tender Status:') !!}
    <p>{{ $tender->tender_status }}</p>
</div>

<!-- Bg Status Field -->
<div class="form-group">
    {!! Form::label('bg_status', 'Bg Status:') !!}
    <p>{{ $tender->bg_status }}</p>
</div>

<!-- Pg Status Field -->
<div class="form-group">
    {!! Form::label('pg_status', 'Pg Status:') !!}
    <p>{{ $tender->pg_status }}</p>
</div>

<!-- Opening Date Field -->
<div class="form-group">
    {!! Form::label('opening_date', 'Opening Date:') !!}
    <p>{{ $tender->opening_date }}</p>
</div>

