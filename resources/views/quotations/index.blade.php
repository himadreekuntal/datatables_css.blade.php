@extends('pos_layouts.app')
@section('title')
    Quotations
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">New Quotation</h3>
                <div>                    &nbsp;
                    <a href="{{ route('quotations.create') }}" class="btn btn-primary form-btn"><i class="fas fa-plus"></i> Quotation</a>

                </div>
            </div>
            <div class="card-body">
                @include('quotations.table')
            </div>
       </div>
   </div>

    </section>
@endsection

