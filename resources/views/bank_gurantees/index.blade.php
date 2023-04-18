@extends('other_layouts.app')
@section('title')
    Bank Gurantees
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Bank Guarantee</h3>
                <div>                    &nbsp;
                    <a href="{{ route('bankGurantees.create') }}" class="btn btn-primary form-btn">Bank Guarantee <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('bank_gurantees.table')
            </div>
       </div>
   </div>

    </section>
@endsection

