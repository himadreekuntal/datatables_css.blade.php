@extends('pos_layouts.app')
@section('title')
    Customers
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Customers</h3>
                <div>                    &nbsp;
                    <a href="{{ route('customers.create') }}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Customer</a>
                </div>
            </div>
            <div class="card-body">
                @include('customers.table')
            </div>
       </div>
   </div>

    </section>
@endsection

