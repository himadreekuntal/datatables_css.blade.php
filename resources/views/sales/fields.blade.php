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
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-12 col-lg-6">
                    {!! Form::label('customer_id', 'Customer Name:') !!}<br/>
                    <select name="customer_id" id="customer_id" class="customerid form-control">

                        <option value=""></option>
                        @foreach($customer as $key3 => $customer)

                        <option value="{{$customer->id}}" data-price="{{ $customer->email }}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    {!! Form::label('sales_date', 'Sales Date:') !!}
                      {!! Form::text('sales_date', null, ['class' => 'form-control','id'=>'sales_date','autocomplete'=>'off']) !!}
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    {!! Form::label('customer_address', 'Customer Email:') !!}
                    <input type="text" name="customer_address" id="customer_address" class="form-control" autocomplete="off" readonly>
                </div>

                <div class="form-group col-sm-12 col-lg-6">
                    {!! Form::label('po', 'Purchase/WorK Order:') !!}
                    <input type="text" name="po" id="po" class="form-control" autocomplete="off">
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


             <table>
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
                <tbody class="neworderbody">
                    <tr>
                    <td>1</td>
                        <td>
                          <select name="product_id[]" id="productId" class="product_id form-control">
                                     <option value=""></option>
                                       @foreach($product as $r)
                                         <option  value="{!! $r->id !!}"  data-price="{!! $r->selling_price !!}">{!! $r->product !!}</option>
                                    @endforeach
                          </select>
                        </td>
                        <td>
                            <input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                        </td>

                        <td>
                            <input type="text" class="serial form-control" name="serial[]" id="serial" value="{{ old('email') }}">
                        </td>
                        <td>
                            <input type="text" class="price form-control" name="price[]" id="price_1" value="{{ old('email') }}">
                        </td>
                        <td>
                            <input type="text" class="dis form-control" name="dis[]" id="discount">
                        </td>
                        <td>
                            <input type="text" class="amount form-control" name="amount[]">
                        </td>
                        <td>
                            <input type="button" class="btn btn-danger delete" value="x">
                        </td>
                    </tr>

                </tbody>

                <tfoot>
                    <th colspan="6">Total:<b class="total">0</b></th>
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
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-sm-4">
                        {!! Form::label('sub_total', 'Sub Total:') !!}
                        {!! Form::text('sub_total', null, ['class' => 'form-control','readonly'=>'']) !!}
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
                        {!! Form::text('vat_amount', null, ['class' => 'form-control','readonly'=>'']) !!}
                    </div>


                    <div class="form-group col-sm-4">
                        {!! Form::label('total_amount', 'Total Amount:') !!}
                        {!! Form::text('total_amount', null, ['class' => 'form-control','readonly'=>'']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('paid', 'Paid:') !!}
                        {!! Form::text('paid', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Due Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('due', 'Due:') !!}
                        {!! Form::text('due', null, ['class' => 'form-control']) !!}
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
                <br>
                    <!-- Payment Status Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('payment_status', 'Payment Status:') !!}
                        {!! Form::text('payment_status', null, ['class' => 'form-control','readonly'=>'']) !!}
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


    $('#productId').select2({
        placeholder: "Select a Product",
         allowClear: true
    });

    $('.customerid').select2({
        placeholder: "Select a Cutomer",
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
            '<td><input type="text" class="serial form-control" name="serial[]"  id="serial" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="price form-control" name="price[]" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="dis form-control" name="dis[]" id="discount"></td>' +
				'<td><input type="text" class="amount form-control" name="amount[]"></td>' +
				'<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
			$('.neworderbody').append(tr);

			var rowId = '.product_id'+n;
			console.log(rowId);

         $('#productId1').attr('id', rowId).select2({
             placeholder: "Select a Product",
             allowClear: true

         });
            	});



        $('.neworderbody').delegate('.product_id', 'change', function () {

			var tr = $(this).parent().parent();
            var productID = $(this).val();

            $.ajax({
                type:"GET",
                url:"/checkStock/"+productID,
                success:function(response){
                    if(response == "true"){
                        tr.find('.qty').prop('readonly', false);
                        tr.find('.qty').val('');
                        tr.find('.dis').prop('readonly', false);
                        tr.find('.price').prop('readonly', false);
                        tr.find('.serial').prop('readonly', false);
                        tr.find('.amount').prop('readonly', false);

                        var price = tr.find('.product_id option:selected').attr('data-price');
                        tr.find('.price').val(price);

                        var qty = tr.find('.qty').val() - 0;
                        var dis = tr.find('.dis').val() - 0;
                        var price = tr.find('.price').val() - 0;

                        var total = (qty * price) - (qty * dis);
                        tr.find('.amount').val(total);
                        totalAmount();
                    }
                    else{
                        tr.find('.qty').prop('readonly', true);
                        tr.find('.qty').val('No Stock');
                        tr.find('.dis').prop('readonly', true);
                        tr.find('.price').prop('readonly', true);
                        tr.find('.serial').prop('readonly', true);
                        tr.find('.amount').prop('readonly', true);

                    }
                }
            });


		});

        $('.neworderbody').delegate('.qty , .dis', 'keyup', function () {


			var tr = $(this).parent().parent();
            var qty = tr.find('.qty').val() - 0;
            var dis = tr.find('.dis').val() - 0;
            var price = tr.find('.price').val() - 0;
            var productID = tr.find('.product_id').val();
            $.ajax({
                type: "GET",
                url: "/checkQuantity/" + productID + '/' +qty,
                success: function (response) {
                    if(response == "True"){
                        var total = (qty * price) - (qty * dis);
                        tr.find('.amount').val(total);
                        totalAmount();
                    }
                    else{
                        alert("Not Enough Stock for Current Selected Product");
                        tr.find('.qty').val('');
                        var total = (qty * price) - (qty * dis);
                        tr.find('.amount').val(total);
                        totalAmount();
                    }
                }
            });
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

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year ;
document.getElementById('sales_date').value = today;

 let input1 = document.getElementById('serial');
 let input2 = document.getElementById('discount');

 document.getElementById("myform").addEventListener("submit", function(e){

             $("#pageloader").fadeIn();

         });//submit



</script>
@endsection

