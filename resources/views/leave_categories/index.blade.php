@extends('hrm_layouts.app')
@section('title')
    Leave Categories
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Leave Categories </h3>
                <div>                    &nbsp;
                    <a href="{{ route('leaveCategories.create') }}" class="btn btn-primary form-btn">Leave Categories <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('leave_categories.table')
            </div>
       </div>
   </div>

    </section>
@endsection

