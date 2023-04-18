@extends('pos_layouts.app')
@section('title')
    Create Customer
@endsection
@section('content')
    <section class="section">
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
                <div class="card" style="margin-top: 50px;">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="page__heading m-0">Create Customer</h3>
                        <div>                    &nbsp;
                            <a href="{{ route('customers.index') }}" class="btn btn-primary form-btn">Back</a>

                        </div>
                    </div>
                   <div class="col-lg-12">
                       <div class="card">
                           <div class="card-body">
                                {!! Form::open(['route' => 'customers.store']) !!}
                                    <div class="row">
                                        @include('customers.fields')
                                    </div>
                                {!! Form::close() !!}
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </section>
@endsection
