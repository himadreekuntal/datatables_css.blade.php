@extends('hrm_layouts.app')
@section('title')
    Employee Leaves
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Employee Leave</h3>
                <div>                    &nbsp;
                    <a href="{{ route('employeeLeaves.create') }}" class="btn btn-primary form-btn">Employee Leave <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('employee_leaves.table')
            </div>
       </div>
   </div>

    </section>
@endsection

