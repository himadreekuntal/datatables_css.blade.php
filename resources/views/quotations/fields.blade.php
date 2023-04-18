
<!-- Sales Id Field -->
<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-sm-6">
                {!! Form::label('customer_id', 'Customer Name:') !!}<br/>
                <select name="customer_id" id="customer_id" class=" customerid form-control">

                   <option value=""></option>
                    @foreach($customer as $key3 => $customer)

                    <option value="{{$customer->id}}" data-price="{{ $customer->email }}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            &nbsp;
            <div class="form-group col-sm-6">
                {!! Form::label('qut_date', 'Sales Date:') !!}
                {!! Form::text('qut_date', null, ['class' => 'form-control','id'=>'qut_date', 'autocomplete'=>'off']) !!}
            </div>


        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('customer_address', 'Customer Email:') !!}
                <input type="text" name="customer_address" id="customer_address" class="form-control" autocomplete="off" readonly>
            </div>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody class="neworderbody">
                <tr>
                    <td class="no">1</td>
                    <td>

                        <select name="product_id[]" id="productId" class="product_id form-control">
                            <option value=""></option>
                                    @foreach($product as $r)
                                        <option value="{!! $r->id !!}"  data-price="{!! $r->selling_price !!}">{!! $r->product !!}</option>
                                    @endforeach

                        </select>


                    </td>
                    <td>
                        <input type="text" class="qty form-control" name="qty[]" value="{{ old('email') }}">
                    </td>


                    <td>
                        <input type="text" class="price form-control" name="price[]" id="price_1" value="{{ old('email') }}">
                    </td>
                    <td>
                        <input type="text" class="dis form-control" name="dis[]">
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



        <input type="button" class="btn btn-lg btn-primary add" value="Add New Item">

    </div>
</div>


<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="form-group col-sm-4">
                {!! Form::label('sub_total', 'Sub Total:') !!}
                {!! Form::text('sub_total', null, ['class' => 'form-control','readonly'=>'']) !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('tax', 'Govt. Tax:') !!}
                <select name="tax" id="tax" class="form-control">
                    <option selected value="">Please Select One</option>
                    <option value="0">Not Included</option>
                    <option value="1">Included</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('tax_amount', 'TAX Amount:') !!}
                {!! Form::text('tax_amount', null, ['class' => 'form-control','readonly'=>'']) !!}
            </div>


            <div class="form-group col-sm-4">
                {!! Form::label('total_amount', 'Total Amount:') !!}
                {!! Form::text('total_amount', null, ['class' => 'form-control','readonly'=>'']) !!}
            </div>


            <div class="form-group col-sm-4">
                {!! Form::label('delivery_time', 'Delivery Time:') !!}
                <select name="delivery_time" id="delivery_time" class="selectpicker form-control"  data-actions-box="true" title="Choose one of the following..."  data-live-search="true" , data-done-button="true">
                    <option value="In Stock">In Stock</option>
                    <option value="After 45 days of Receiving Work Order">After 45 days of Receiving Work Order</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('payment', 'Payment Terms:') !!}
                <select name="payment" id="payment" class="selectpicker form-control"  data-actions-box="true" title="Choose one of the following..."  data-live-search="true" , data-done-button="true">
                    <option value="Full Payment at the time of delivery">Full Payment at the time of delivery</option>
                    <option value="30% Advance Payment">30% Advance Payment</option>
                    <option value="40% Adavance Payment">40% Adavance Payment</option>
                </select>
            </div>

            <!-- Payment Status Field -->


            <div class="form-group col-sm-12">
                {!! Form::label('payment_reference', 'Notes:') !!}
                <textarea class="form-control payment_reference" id="payment_reference" name="payment_reference"></textarea>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('quotations.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@section('scripts')
<script>

$('#qut_date').datepicker({
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
});



     $(function() {
   $('#customer_id').on('change', function(){
    var price = $(this).children('option:selected').data('price');
      // console.log(price);
      $('#customer_address').val(price);
   });
});

$('.payment_reference').summernote({
    height: 200
});


var i=$('table tr').length;
$('.add').click(function ()
        {
			var product = $('.product_id').html();
          //  var tr = $(this).parent().parent();
			var n = ($('.neworderbody tr').length - 0) + 1;
			var tr = '<tr><td class="no">' + n + '</td>' + '<td> <select name="product_id[]" id="productId1" class="product_id form-control" data-actions-box="true"  data-live-search="true" , data-done-button="true">'+
                            '<option value=""></option>'+
                            @foreach($product as $r)
                                       '<option value="{!! $r->id !!}"  data-price="{!! $r->selling_price !!}">{!! $r->product !!}</option>'+
                            @endforeach
                        '</select></td>' +

				'<td><input type="text" class="qty form-control" name="qty[]" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="price form-control" name="price[]" value="{{ old('email ') }}"></td>' +
				'<td><input type="text" class="dis form-control" name="dis[]"></td>' +
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
			var price = tr.find('.product_id option:selected').attr('data-price');
            var pricef = Number(price) + Number((price *7)/100);
			tr.find('.price').val(pricef);
			var qty = tr.find('.qty').val() - 0;
			var dis = tr.find('.dis').val() - 0;
			var price = (tr.find('.price').val() - 0) ;

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
        $('#total_amount').val(t.toFixed(2));

	}

    $(document).on('change keyup blur','#tax',function(){
	    calculateTotal();
    });

   /* $(document).on('change keyup blur','#ait',function(){
	    calculateTotal();
    });*/

    $(document).on('change keyup blur','#paid',function(){
	    calculateAmountDue();
    });

    function calculateTotal() {
        subTotal = $('#sub_total').val();
        var total;
        tax = $('#tax').val();
        if (tax == '0') {
            taxAmount = subTotal * (0 / 100);
            $('#tax_amount').val(taxAmount.toFixed(2));
            totalAmount = Number(subTotal) + Number(taxAmount);
            $('#total_amount').val(totalAmount.toFixed(2));
        } else {
            if (subTotal < 5000000) {
                totalAmount = subTotal * (100 / 89.5);
            } else if (subTotal >= 5000000 && subTotal < 20000000) {
                totalAmount = subTotal * (100 / 87.5);
            } else {
                totalAmount = subTotal * (100 / 85.5);
            }
            totalAftertax = Number(totalAmount) - Number(subTotal);
            $('#tax_amount').val(totalAftertax.toFixed(2));
            $('#total_amount').val(totalAmount.toFixed(2));
        }
    }
   $(document).on('focus','.autocomplete_txt',function(){
        type = $(this).data('type');

  if(type =='productname' )autoType='name';
  //if(type =='country_code' )autoType='sortname';

   $(this).autocomplete({
       minLength: 0,
       source: function( request, response ) {
            $.ajax({
                url: "{{ route('searchajax') }}",
                dataType: "json",
                data: {
                    term : request.term,
                    type : type,
                },
                success: function(data) {
                    console.log(data);
                    var array = $.map(data, function (item) {
                       return {
                           label: item[autoType],
                           value: item[autoType],
                           data : item
                       }
                   });
                    response(array)
                }
            });
       },
       select: function( event, ui ) {
           var data = ui.item.data;
           id_arr = $(this).attr('id');
           id = id_arr.split("_");
           elementId = id[id.length-1];
           $('#productname_'+elementId).val(data.name);
           $('#price_'+elementId).val(data.sortname);
       }
   });


});

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = day + "-" + month + "-" + year ;
document.getElementById('qut_date').value = today;
</script>
@endsection

