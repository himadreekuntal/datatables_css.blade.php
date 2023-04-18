@extends('other_layouts.app')
@section('title')
    Performance Gurantee Details
@endsection
@section('content')
    <section class="section">
   @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Show PG </h3>
                <div>                    &nbsp;
                    <a href="{{ route('performanceGurantees.index') }}" class="btn btn-primary form-btn">Back</a>

                </div>
            </div>
            <div class="card-body">
                    @include('performance_gurantees.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
