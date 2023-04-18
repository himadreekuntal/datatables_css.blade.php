<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','autocomplete'=>'off']) !!}
</div>

<!-- Benificiary Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Benificiary Name:') !!}    <br>


    <select name="brand_id" id="brand_id" class="brandID form-control">
    <option name="brand_id" value="{{$lCDetail->brand_id}}" hidden>{{$lCDetail->brand->brand}}</option>
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
    {!! Form::label('currency_type', 'Currency Type:') !!} <br>
    <select name="currency_type" id="currency_type" class="ctype form-control">
    <option name="currency_type" value="{{$lCDetail->currency_type}}" hidden>{{$lCDetail->currency_type}}</option>
        @foreach($currency as $key3 => $currency)
            <option value={{$currency}}>{{$currency}}</option>
                    @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('conv_rate', 'Convertion Rate:') !!}
    {!! Form::text('conv_rate', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('total_amount_bdt', 'Total Amount(BDT):') !!}
    {!! Form::text('total_amount_bdt', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('payment_type', 'Payment Type:') !!} <br>
    <select name="payment_type" id="payment_type" class="ptype form-control">
    <option name="payment_type" value="{{$lCDetail->payment_type}}" hidden>{{$lCDetail->payment_type}}</option>

         <option value="lc">L/C</option>
         <option value="tt">TT</option>

</select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('margin_percentage', 'Margin Percentage:') !!}
    {!! Form::text('margin_percentage', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<!-- Margin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('margin', 'Margin:') !!}
    {!! Form::text('margin', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly']) !!}
</div>

<!-- Ltr Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ltr_amount', 'LTR Amount:') !!}
    {!! Form::text('ltr_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'readonly']) !!}
</div>


<div class="form-group col-sm-4">
        {!! Form::label('ltr_status', 'LTR Status:') !!}
        {!! Form::text('ltr_status', null, ['class' => 'form-control','readonly'=>'']) !!}
    </div>

<!-- Invoice Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice', 'Proforma Invoice:') !!}
    <input type="test" name="invoice1" value="{{$lCDetail->invoice}}" hidden>
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="invoice"></span>
</div>

<!-- Lc Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lc_document', 'LC Copy:') !!}
    <input type="test" name="lc_document1" value="{{$lCDetail->lc_document}}" hidden>
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="lc_document"></span>
</div>

<!-- Boe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('boe', 'Bill of Entry:') !!}
    <input type="test" name="boe1" value="{{$lCDetail->boe}}" hidden>
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="boe"></span>
</div>

<!-- Bank Statement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_statement', 'LTR Statement:') !!}
    <input type="test" name="bank_statement1" value="{{$lCDetail->bank_statement}}" hidden>
    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="bank_statement"></span>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('lCDetails.index') }}" class="btn btn-light">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.brandID').select2({
        placeholder: "Select a Brand",
         allowClear: true
    });
    $('.ctype').select2({
        placeholder: "Select a Currency",
         allowClear: true
    });

    $('.ptype').select2({
        placeholder: "Select a Payment Method",
         allowClear: true
    });


});

$('#date').datepicker({
                uiLibrary: 'bootstrap4',
                format: "dd-mm-yyyy",
                todayHighlight: true
            });
    $('#ltr_date').datepicker({
        uiLibrary: 'bootstrap4',
        format: "dd-mm-yyyy",
        todayHighlight: true
    });


   $(document).on('change keyup blur','#payment_type',function(){
	    calculateTotal();
    });

    $(document).on('change keyup blur','#amount',function(){
	    calculateBDT();
    });

    $(document).on('change keyup blur','#conv_rate',function(){
       // console.log('asdads');
	    calculateBDT();
    });

$(document).on('change keyup blur','#margin_percentage',function(){
    // console.log('asdads');
    calculateTotal();
});


function calculateTotal(){
        paymentType = $('#payment_type').val();
        total_amount = $('#total_amount_bdt').val();
        percentage = $('#margin_percentage').val();
        console.log(paymentType);
        if(paymentType == "lc"){
            mAmount = ( total_amount * ( percentage /100 ));
            ltrAmount =  total_amount - mAmount;
            console.log(mAmount);
            $('#margin').val(mAmount.toFixed(2));
            $('#ltr_amount').val(ltrAmount.toFixed(2));
            $('#ltr_adjustment').val(ltrAmount.toFixed(2));
            $('#ltr_status').val("LTR not Adjuested");
        }
        if(paymentType == "tt"){
            mAmount = ( total_amount * ( 100 /100 ));
            ltrAmount =  total_amount - mAmount;
            console.log(mAmount);
            $('#margin').val(mAmount.toFixed(2));
            $('#ltr_amount').val(ltrAmount.toFixed(2));
            $('#ltr_adjustment').val(ltrAmount.toFixed(2));
            $('#ltr_status').val("Not Applicable");
        }
    }

    function calculateBDT(){
        rate = $('#conv_rate').val();
        amount = $('#amount').val();
        totalAmount = (amount * rate);
        $('#total_amount_bdt').val(totalAmount.toFixed(2));
    }

var sdate = $('#date').val();
//console.log(date);
var date = new Date(sdate);

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year;


document.getElementById('date').value = today;



</script>


@endsection
