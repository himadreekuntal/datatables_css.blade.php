@extends('other_layouts.app')
@section('title')
    Letter of Credit
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0"> LC </h3>
                <div>                    &nbsp;
                    <a href="{{ route('lCDetails.create') }}" class="btn btn-primary form-btn">LC <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('l_c_details.table')
            </div>
       </div>
   </div>

    </section>
@endsection

