@extends('finance_layouts.app')
@section('title')
    Cash Hand Details
@endsection
@section('content')
    <section class="section">
   @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Cash hand List</h3>
                <div>                    &nbsp;
                    <a href="{{ route('cashHands.index') }}" class="btn btn-primary form-btn">Back </a>
                </div>
            </div>
            <div class="card-body">
                    @include('cash_hands.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
