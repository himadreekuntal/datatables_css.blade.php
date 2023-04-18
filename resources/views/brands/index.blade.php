@extends('pos_layouts.app')
@section('title')
    Brands
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Brands</h3>
                <div>                    &nbsp;
                    <a href="{{ route('brands.create') }}" class="btn btn-primary form-btn">Brand <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('brands.table')
            </div>
       </div>
   </div>

    </section>
@endsection

