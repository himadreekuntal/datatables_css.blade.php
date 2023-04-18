@extends('hrm_layouts.app')
@section('title')
    Education Employees
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Education Employees</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('educationEmployees.create')}}" class="btn btn-primary form-btn">Education Employee <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('education_employees.table')
            </div>
       </div>
   </div>

    </section>
@endsection

