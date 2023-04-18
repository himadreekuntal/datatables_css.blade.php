@extends('pos_layouts.app')
@section('title')
   Create Products
@endsection

@section('content')

     <div class="container-fluid">
          <div class="animated fadeIn">
          @include('stisla-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card" style="margin-top: 50px;">
                             <div class="card-header d-flex justify-content-between">
                                <h3 class="page__heading m-0">New Products</h3>
                                <div>                    &nbsp;
                                    <a href="{{ route('products.index') }}" class="btn btn-primary form-btn">Back</a>

                                </div>
                             </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'products.store', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf

                                   @include('products.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
