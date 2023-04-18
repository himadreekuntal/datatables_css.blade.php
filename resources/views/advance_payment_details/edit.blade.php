@extends('hrm_layouts.app')
@section('title')
    Edit Advance Payment Detail
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">Edit Advance Payment Detail</h3>
                <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                    <a href="{{ route('advancePaymentDetails.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($advancePaymentDetail, ['route' => ['advancePaymentDetails.update', $advancePaymentDetail->id], 'method' => 'patch']) !!}
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
