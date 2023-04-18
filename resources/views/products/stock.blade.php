
@extends('pos_layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('products.index') !!}">Product</a>
          </li>
          <li class="breadcrumb-item active">Add Stock</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
         @include('stisla-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Add Stock</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::open(['route' => ['stockUpdate',$id], 'enctype'=>'multipart/form-data','method'=>'post']) !!}

                             <div class="row">


                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('product', 'Name:') !!}
                                            <input class="form-control" name="product" type="text" id="product" value="{{$name}}" readonly>
                                            <input class="form-control" name="product_id" type="text" id="product_id" value="{{$id}}" hidden>
                                        </div>

                                        <div class="form-group col-sm-3">
                                            {!! Form::label('qty', 'Quantity:') !!}
                                            <input class="form-control" name="qty" type="text" id="qty" value="{{$qty}}" readonly>
                                        </div>

                                        <div class="form-group col-sm-3">
                                            {!! Form::label('date', 'Date:') !!}
                                            <input class="form-control" name="date" type="date" id="date">
                                        </div>

                                    </div>
                                    <div class="row">





                                        <!-- Warranty Field -->
                                        <div class="form-group col-sm-4">
                                            {!! Form::label('new_quantity', 'New Qunatity:') !!}
                                            <input class="form-control" name="new_quantity" type="text" id="new_quantity">
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- Buying Price Field -->
                                        <div class="form-group col-sm-5">
                                            {!! Form::label('total_quantity', 'Total Quantity:') !!}
                                            <input class="form-control" name="total_quantity" type="text" id="total_quantity" readonly>
                                        </div>



                                    </div>

                                    <div class="row">

                                        <div class="form-group col-sm-6">


                                        </div>

                                    <!-- Status Field -->

                                    </div>
                                    <!-- Submit Field -->
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                            <a href="{{ route('products.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection







@section('scripts')
<script>
$(document).on('change keyup blur','#new_quantity',function(){
	    calculateTotal();
    });
    function calculateTotal(){
        qty = $('#qty').val();

       console.log(qty);

        nqty = $('#new_quantity').val();
        console.log(nqty);
      tqy = Number(qty) + Number(nqty);
      $('#total_quantity').val(tqy);
}

</script>
@endsection
