@extends('hrm_layouts.app')
@section('title')
    Advance Payment Details
@endsection
@section('content')
    <section class="section">

   @include('stisla-templates::common.errors')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="margin-top: 50px;">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="page__heading m-0">Advance payment Details</h3>
                        <div>                    &nbsp;
                            <a href="{{ route('advancePayments.index') }}" class="btn btn-primary form-btn">Back</a>

                        </div>
                    </div>
            <div class="card-body">
                    @include('advance_payments.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
