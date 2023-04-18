

<div class="form-group col-sm-6">
    {!! Form::label('cashT', 'Today Cash in hand:') !!}
    <input type="text" class="form-control" name="cashT" id="cashT" value="{{$cashT}}" readonly>
</div>


<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','autocomplete'=>'off']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Remaining Cash on Hand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cashR', 'Remaining Cash on Hand:') !!}
    {!! Form::text('cashR', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly'=>true]) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', 'Reference:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bankTransactions.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>
        $('#date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = day + "-" + month + "-" + year ;
        document.getElementById('date').value = today;
        $(document).on('change keyup blur','#amount',function(){
            $total = $('#cashT').val();
            $amount = $('#amount').val();
            $remaining = $total - $amount;
            $('#cashR').val($remaining.toFixed(2));
        });
    </script>
@endsection
