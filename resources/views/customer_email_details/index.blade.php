@extends('other_layouts.app')
@section('title')
    Customer Email Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Customer Email Details</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('customerEmailDetails.create')}}" class="btn btn-primary form-btn">Customer Email Detail <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('customer_email_details.table')
            </div>
       </div>
   </div>

    </section>
@endsection

