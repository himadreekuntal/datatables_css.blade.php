@extends('hrm_layouts.app')
@section('title')
    Advance Payment Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Advance Payment Details</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('advancePaymentDetails.create')}}" class="btn btn-primary form-btn">Advance Payment Detail <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('advance_payment_details.table')
            </div>
       </div>
   </div>

    </section>
@endsection

