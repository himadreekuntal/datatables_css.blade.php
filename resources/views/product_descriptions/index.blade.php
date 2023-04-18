@extends('other_layouts.app')
@section('title')
    Product Descriptions
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Product Description </h3>
                <div>                    &nbsp;
                    <a href="{{ route('productDescriptions.create') }}" class="btn btn-primary form-btn">Product Description <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('product_descriptions.table')
            </div>
       </div>
   </div>

    </section>
@endsection

