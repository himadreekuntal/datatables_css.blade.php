@extends('hrm_layouts.app')
@section('title')
    Monthly Salaries
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Create Monthly Salaries </h3>
                <div>                    &nbsp;
                    <a href="{{ route('monthlySalaries.create') }}" class="btn btn-primary form-btn">Monthly Salary <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('monthly_salaries.table')
            </div>
       </div>
   </div>

    </section>
@endsection

