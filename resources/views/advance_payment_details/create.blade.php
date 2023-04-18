@extends('hrm_layouts.app')
@section('title')
    Create Advance Payment Detail
@endsection
@section('content')
    <section class="section">
         <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body ">
                                {!! Form::open(['route' => 'advancePaymentDetails.store']) !!}
                                    <div class="row">
                                        @include('advance_payment_details.fields')
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
