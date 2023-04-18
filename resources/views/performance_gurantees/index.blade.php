@extends('other_layouts.app')
@section('title')
    Performance Gurantees
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Performance Gurantee </h3>
                <div>                    &nbsp;
                    <a href="{{ route('performanceGurantees.create') }}" class="btn btn-primary form-btn">PG <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('performance_gurantees.table')
            </div>
       </div>
   </div>

    </section>
@endsection

