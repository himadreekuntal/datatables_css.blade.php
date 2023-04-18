@extends('hrm_layouts.app')
@section('title')
    Employee Salaries
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Create Employee Salaries</h3>
                <div>                    &nbsp;
                    <a href="{{ route('employeeSalaries.create') }}" class="btn btn-primary form-btn">Employee Salary <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('employee_salaries.table')
            </div>
       </div>
   </div>

    </section>
@endsection

