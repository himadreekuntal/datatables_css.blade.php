@extends('other_layouts.app')
@section('title')
    L T R Payment Details
@endsection
@section('content')
    <section class="section">
   @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">LTR Payment List </h3>
                <div>                    &nbsp;
                    <a href="{{ route('lTRPayments.index') }}" class="btn btn-primary form-btn">Back</a>

                </div>
            </div>
            <div class="card-body">
                    @include('l_t_r_payments.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
