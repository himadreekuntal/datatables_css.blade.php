@extends('pos_layouts.app')
@section('title')
    Edit Sale
@endsection
@section('content')
    <section class="section">

  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">

                     <div class="col-lg-12">
                         <div class="card" style="margin-top: 50px;">
                             <div class="card-header d-flex justify-content-between">
                                 <h3 class="page__heading m-0">Edit Product</h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('products.index') }}" class="btn btn-primary form-btn">Product <i class="fas fa-plus"></i></a>

                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($sale, ['route' => ['sales.update', $sale->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('sales.fieldsedit')
                                        </div>

                                    {!! Form::close() !!}
                            </div>
                         </div>
                    </div>
                 </div>
              </div>
   </div>
  </section>
@endsection
