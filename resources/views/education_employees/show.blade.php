@extends('hrm_layouts.app')
@section('title')
    Education Employee Details
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Education Employee Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('educationEmployees.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('education_employees.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
