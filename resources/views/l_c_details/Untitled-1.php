<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Benificiary Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('benificiary_name', 'Benificiary Name:') !!}    <br>
    <select name="benificiary_name" id="benificiary_name" class="selectpicker" data-actions-box="true" title="Choose one of the following..."  data-live-search="true" , data-done-button="true">
        @foreach($brand as $key3 => $brand)
            <option value="{{$brand->id}}">{{$brand->brand}}</option>
                    @endforeach
            </select>
</div>

<!-- Commodities Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commodities', 'Commodities:') !!}
    {!! Form::text('commodities', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Payment Type Field -->


<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!} <br>
    <select name="payment_type" id="payment_type" class="selectpicker" data-actions-box="true" title="Choose one of the following..."  data-live-search="true" , data-done-button="true">
        
        
         <option value="lc">L/C</option>
         <option value="tt">TT</option>
       
</select>
</div>

<!-- Margin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('margin', 'Margin:') !!}
    {!! Form::text('margin', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly']) !!}
</div>

<!-- Ltr Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ltr_amount', 'Ltr Amount:') !!}
    {!! Form::text('ltr_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly']) !!}
</div>


<div class="form-group col-sm-4">
        {!! Form::label('ltr_status', 'Ltr Status:') !!}
        {!! Form::text('ltr_status', null, ['class' => 'form-control','readonly'=>'']) !!}
    </div>

<!-- Invoice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice', 'Invoice:') !!}
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="invoice"></span>
</div>

<!-- Lc Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lc_document', 'Lc Document:') !!}
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="lc_document"></span>
</div>

<!-- Boe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('boe', 'Boe:') !!}
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="boe"></span>
</div>

<!-- Bank Statement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_statement', 'Bank Statement:') !!}
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="bank_statement"></span>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lCDetails.index') }}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
<script>
 $('#date').datepicker({
                uiLibrary: 'bootstrap4',
                format: "dd-mm-yyyy",
                todayHighlight: true
            })
    $('#ltr_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: "dd-mm-yyyy",
        todayHighlight: true
    })

   $(document).on('change keyup blur','#payment_type',function(){
	    calculateTotal();
    });

    function calculateTotal(){
        paymentType = $('#payment_type').val();
        amount = $('#amount').val();
        console.log(paymentType);
        if(paymentType == "lc"){
            mAmount = (amount * ( 10 /100 ));
            ltrAmount = amount - mAmount;
            console.log(mAmount);
            $('#margin').val(mAmount.toFixed(2));
            $('#ltr_amount').val(ltrAmount.toFixed(2));
            $('#ltr_adjustment').val(ltrAmount.toFixed(2));
            $('#ltr_status').val("LTR adjustment not done");
        }
        if(paymentType == "tt"){
            mAmount = (amount * ( 100 /100 ));
            ltrAmount = amount - mAmount;
            console.log(mAmount);
            $('#margin').val(mAmount.toFixed(2));
            $('#ltr_amount').val(ltrAmount.toFixed(2));
            $('#ltr_adjustment').val(ltrAmount.toFixed(2));
            $('#ltr_status').val("No nedd for adjust");
        }
    }  

    $(document).on('change keyup blur','#ltr_date',function(){
       
        $('#ltr_status').val("Ltr adjusted");
    });
    

</script>


@endsection