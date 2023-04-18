@extends('finance_layouts.app')
@section('title')
    Cash Hands
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Cash in Hand</h3>
                <div>                    &nbsp;
                    <a href="{{ route('cashHands.create') }}" class="btn btn-primary form-btn">Cash Hand <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('cash_hands.table')
            </div>
       </div>
   </div>

    </section>
@endsection

