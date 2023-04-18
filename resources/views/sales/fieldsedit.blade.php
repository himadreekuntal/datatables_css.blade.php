<style>

select{
   background: blue;
}

table {
  width: 100%;
  border-collapse: collapse;
}
/* Zebra striping */
tr:nth-of-type(odd) {
  background: #eee;
}
th {
  background: #333;
  color: white;
  font-weight: bold;
}
td, th {
  padding: 6px;
  border: 1px solid #ccc;
  text-align: left;
}



    @media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr {
		display: block;
	}

	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr {
		position: absolute;
		top: -9999px;
		left: -9999px;
	}

	tr { border: 1px solid #ccc; }

	td {
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee;
		position: relative;
		padding-left: 30%;
	}

	td:before {
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%;
		padding-right: 5px;
		white-space: nowrap;
	}



	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "#"; }
	td:nth-of-type(2):before { content: "Name"; }
	td:nth-of-type(3):before { content: "Qty"; }
	td:nth-of-type(4):before { content: "Serial"; }
	td:nth-of-type(5):before { content: "Price"; }
	td:nth-of-type(6):before { content: "Discount"; }
	td:nth-of-type(7):before { content: "Amount"; }

}
</style>


<!-- Sales Id Field -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        {!! Form::label('customer_id', 'Customer Name:') !!}<br/>
                        <select name="customer_id" id="customer_id" class="customerid form-control">
                            <option value="{{$sale->customer->id}}" hidden>{{$sale->customer->name}}</option>
                            @foreach($customer as $customer)
                                <option value="{{$customer->id}}" data-price="{{ $customer->email }}">{{$customer->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-lg-6">
                        {!! Form::label('sales_date', 'Sales Date:') !!}
                        {!! Form::text('sales_date', null, ['class' => 'form-control','id'=>'sales_date','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-12 col-lg-6">
                        {!! Form::label('customer_address', 'Customer Email:') !!}
                        <input type="text" name="customer_address" id="customer_address" class="form-control" autocomplete="off" value = {{$sale->customer->email}} readonly>
                    </div>

                    <div class="form-group col-sm-12 col-lg-6">
                        {!! Form::label('po', 'Purchase/WorK Order:') !!}
                        {!! Form::text('po', null, ['class' => 'form-control','id'=>'po','autocomplete'=>'off']) !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">

        <table id ="count">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Serial</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody id="neworderbody" class="neworderbody">
           <?php
                 $i = 1; ?>

            @foreach($sale->products as $item)

                <tr>
                        <td>{{$i}}</td>

                          <?php  $i++; ?>
                             <td>

                         <select name="product_id[]" id="productId" class="product_id form-control">
                            <option name="product_id[]" value="{{$item->id}}" hidden>{{$item->product}}</option>

                                    @foreach($product as $r)
                                        <option value="{!! $r->id !!}"  data-price="{!! $r->selling_price !!}">{!! $r->product !!}</option>
                                    @endforeach

                        </select>


                    </td>
                    <td>
                        <input type="text" class="qty form-control" name="qty[]" value="{{$item->pivot->quantity}}">
                    </td>

                    <td>
                        <input type="text" class="serial form-control" name="serial[]" value="{{$item->pivot->serial}}">
                    </td>
                    <td>
                        <input type="text" class="price form-control" name="price[]" id="price_1" value="{{$item->pivot->rate}}">
                    </td>
                    <td>
                        <input type="text" class="dis form-control" name="dis[]" value= "{{$item->pivot->discount}}">
                    </td>
                    <td>
                        <input type="text" class="amount form-control" name="amount[]" value= "{{$item->pivot->total}}">
                    </td>
                    <td>
                        <input type="button" class="btn btn-danger delete" value="x">
                    </td>
                </tr>

            @endforeach

            </tbody>

            <tfoot>
            <th colspan="6">Total:<b class="total">{{ $sale->sub_total }}</b></th>
            </tfoot>


        </table>

 <br/>

        <input type="button" class="btn btn-lg btn-primary add" value="Add New Item">


   </div>
   </div>
    </div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-sm-4">
                {!! Form::label('sub_total', 'Sub Total:') !!}
                {!! Form::text('sub_total', null, ['class' => 'form-control','readonly'=>'', 'value'=>'{{ $sale->sub_total }}']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('vat', 'VAT:') !!}
                <select name="vat" id="vat" class="form-control">
                    <option selected value="">Please Select One</option>
                    <option value="0">Not Included</option>
                    <option value="1">Included</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('vat_amount', 'VAT Amount:') !!}
                {!! Form::text('vat_amount', null, ['class' => 'form-control','readonly'=>'','value'=>'{{ $sale->vat_amount }}']) !!}

            </div>


            <div class="form-group col-sm-4">
                {!! Form::label('total_amount', 'Total Amount:') !!}
                {!! Form::text('total_amount', null, ['class' => 'form-control','readonly'=>'','value'=>'{{ $sale->total_amount }}']) !!}
            </div>



            <div class="form-group col-sm-4">
                {!! Form::label('paid', 'Paid:') !!}
                {!! Form::text('paid', null, ['class' => 'form-control', 'value'=>'{{ $sale->paid }}']) !!}
            </div>

            <!-- Due Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('due', 'Due:') !!}
                {!! Form::text('due', null, ['class' => 'form-control', 'readonly'=>'', 'value'=>'{{ $sale->due }}']) !!}
            </div>


            <div class="form-group col-sm-4">
                {!! Form::label('payment_type', 'Payment Type:') !!}
                <select name="payment_type[]" id="payment_type[]" class="form-control payment_type" style="width: 100%" multiple="multiple" >
                     <option value=""></option>
                    <option value="None">None</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                    <option value="Courier">Courier</option>
                    <option value="Bkash">Bkash</option>
                </select>
            </div>





            <!-- Payment Status Field -->
            <div class="form-group col-sm-4">
                {!! Form::label('payment_status', 'Payment Status:') !!}
                {!! Form::text('payment_status', null, ['class' => 'form-control','readonly'=>'','value'=>'{{ $sale->payment_status }}']) !!}
            </div>

            <div class="form-group col-sm-4"></div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@section('scripts')
<script>
 $('#sales_date').datepicker({
                uiLibrary: 'bootstrap4',
                format: "dd-mm-yyyy",
                todayHighlight: true
            })

$(document).ready(function() {
    $('.customerid').select2({
        placeholder: "Select a Cutomer",
         allowClear: true
    });

var table = document.getElementById("neworderbody");
for (var i = 0, row; row = table.rows[i]; i++) {


   	var rowId1 = '.product_id'+i;
	console.log(rowId1);
    // console.log(row);
     $('#productId').attr('id', rowId1).select2({
             placeholder: "Select a Product",
             allowClear: true

         });
   }


    $('#productId').select2({
        placeholder: "Select a Product",
         allowClear: true
    });

    $('.payment_type').select2({
        placeholder: "Select a Payment Process",
         allowClear: true
    });
});




     $(function() {
   $('#customer_id').on('change', function(){
    var price = $(this).children('option:selected').data('price');
      // console.log(price);
      $('#customer_address').val(price);
   });
});


$('.add').click(function ()
        {
			var product = $('.product_id').html();
          //  var tr = $(this).parent().parent();
          var n = ($('.neworderbody tr').length - 0) + 1;
			var tr = '<tr><td class="no">' + n + '</td>' +' <td> <select name="product_id[]" id="productId1" class="product_id form-control" >'+
                            '<option value=""></option>'+
                            @foreach($product as $r)

                                       '<option value="{!! $r->id !!}"  data-price="{!! $r->selling_price !!}">{!! $r->product !!}</option>'+
                            @endforeach
                        '</select></td>' +

				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('email ') }}"></td>' +
            '<td><input type="text" class="serial form-control" name="serial[]" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="price form-control" name="price[]" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
			$('.neworderbody').append(tr);

			var rowId = '.product_id'+n;
		//	console.log(rowId);

         $('#productId1').attr('id', rowId).select2({
             placeholder: "Select a Product",
             allowClear: true

         });
            	});



        $('.neworderbody').delegate('.product_id', 'change', function () {
			var tr = $(this).parent().parent();
			var price = tr.find('.product_id option:selected').attr('data-price');
			tr.find('.price').val(price);

			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;

			var total = (qty * price) - (qty * dis);
			tr.find('.amount').val(total);
			totalAmount();
		});

        $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {
			var tr = $(this).parent().parent();
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = tr.find('.price').val() - 0;

			var total = (qty * price) - (qty * dis);
			tr.find('.amount').val(total);
			totalAmount();
		});

        $('.neworderbody').delegate('.delete', 'click', function () {
			$(this).parent().parent().remove();
			totalAmount();
		});

        function totalAmount(){
		var t = 0;
		$('.amount').each(function(i,e){
			var amt = $(this).val()-0;
			t += amt;
		});
		$('.total').html(t);
        $('#sub_total').val(t);

	}

    $(document).on('change keyup blur','#vat',function(){
	    calculateTotal();
    });

    $(document).on('change keyup blur','#paid',function(){
	    calculateAmountDue();
    });

    function calculateTotal(){
      // total_amount = 0;

       subTotal = $('#sub_total').val();
        var total ;
       console.log(subTotal);

        vat = $('#vat').val();
        if(vat == '1'){

             vatAmount = subTotal * ( 2 /100 );
            $('#vat_amount').val(vatAmount.toFixed(2));

            total = Number(subTotal) + Number(vatAmount);
          //  console.log(total);

        }else{

            //$('#vatAmount').val(0);
            vatAmount = subTotal * ( 0 /100 );
            $('#vat_amount').val(vatAmount.toFixed(2));

            total = Number(subTotal) + Number(vatAmount);
          //  console.log(total);
        }
      //  var total1 = new Intl.NumberFormat('en-In').format(total);

        $('#total_amount').val(total.toFixed(2));
    //    var num = 5.56789;
    //     var n = num.toFixed(2);
    //     console.log(n);
        calculateAmountDue();
    // var number = 1123456.789;
}

function calculateAmountDue(){
	amountPaid = $('#paid').val();
	total = $('#total_amount').val();
  //  console.log(total);
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('#due').val( amountDue.toFixed(2));

        if(amountDue == '0'){
            $('#payment_status').val('Full Payment');
        }

        else if(amountDue == total){
            $('#payment_status').val('UNPAID');
        }

        else{
            $('#payment_status').val('Partial Payment');
        }
       // console.log(amountDue);
	}else{
		total = parseFloat(total).toFixed(2);
		$('#due').val( total );
        $('#payment_status').val('UNPAID');
     //   console.log(total);
	}
}
var sdate = $('#sales_date').val();
var date = new Date(sdate);

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year;


document.getElementById('sales_date').value = today;

 document.getElementById("myform").addEventListener("submit", function(e){

     $("#pageloader").fadeIn();

 });//submit


</script>
@endsection

