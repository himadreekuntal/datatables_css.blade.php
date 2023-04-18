@extends('hrm_layouts.app')
@section('title')
    Advance Payment Detail Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Advance Payment Detail Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('advancePaymentDetails.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('advance_payment_details.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
