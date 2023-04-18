@extends('pos_layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
        <div class="card-header d-flex justify-content-between">
            <h3 class="page__heading m-0">New Product</h3>
            <div>                    &nbsp;
                <a href="{{ route('products.create') }}" class="btn btn-primary form-btn">Product <i class="fas fa-plus"></i></a>

            </div>
        </div>
            <div class="card-body">
                @include('products.table')
            </div>
       </div>
   </div>

    </section>
@endsection

