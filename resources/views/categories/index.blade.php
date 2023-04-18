@extends('pos_layouts.app')
@section('title')
    Categories
@endsection
@section('content')
    <section class="section">

    <div class="section-body">


        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">Categories</h2>
                <div>                    &nbsp;
                    <a href="{{ route('categories.create')}}" class="btn btn-primary form-btn">Category <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('categories.table')
            </div>
        </div>
   </div>

    </section>
@endsection

