@extends('hrm_layouts.app')
@section('title')
    Advance Payments
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Advance payment</h3>
                <div>                    &nbsp;
                    <a href="{{ route('advancePayments.create') }}" class="btn btn-primary form-btn">Advance Payment <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('advance_payments.table')
            </div>
       </div>
   </div>

    </section>
@endsection

