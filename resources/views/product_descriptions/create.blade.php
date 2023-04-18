@extends('other_layouts.app')
@section('title')
    Create Product Description
@endsection
@section('content')
    <section class="section">

        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card" style="margin-top: 50px;">
                           <div class="card-header d-flex justify-content-between">
                               <h3 class="page__heading m-0">Create Product Description </h3>
                               <div>                    &nbsp;
                                   <a href="{{ route('productDescriptions.index') }}" class="btn btn-primary form-btn">Back</a>

                               </div>
                           </div>
                           <div class="card-body ">
                                {!! Form::open(['route' => 'productDescriptions.store','enctype'=>'multipart/form-data']) !!}
                               @csrf
                                    <div class="row">
                                        @include('product_descriptions.fields')
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
