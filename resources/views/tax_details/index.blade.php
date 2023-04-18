@extends('hrm_layouts.app')
@section('title')
    Tax Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tax Details</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('taxDetails.create')}}" class="btn btn-primary form-btn">Tax Detail <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('tax_details.table')
            </div>
       </div>
   </div>

    </section>
@endsection

