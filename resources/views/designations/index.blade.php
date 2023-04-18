@extends('hrm_layouts.app')
@section('title')
    Designations
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Designation</h3>
                <div>                    &nbsp;
                    <a href="{{ route('designations.create') }}" class="btn btn-primary form-btn">Designation <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('designations.table')
            </div>
       </div>
   </div>

    </section>
@endsection

