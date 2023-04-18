<style>
    #pageloader
    {
        background: rgba( 255, 255, 255, 0.8 );
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999;
    }

    #pageloader img
    {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }
</style>
@extends('pos_layouts.app')
@section('title')
    Create Sale
@endsection
@section('content')

    <section class="section">
        <div class="content">
            @include('stisla-templates::common.errors')
            <div id="pageloader">
                <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
            </div>
            <div class="section-body">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="card" style="margin-top: 50px;">
                           <div class="card-header d-flex justify-content-between">
                               <h3 class="page__heading m-0">Create Sale</h3>
                               <div>                    &nbsp;
                                   <a href="{{ route('sales.index') }}" class="btn btn-primary form-btn">Back</a>

                               </div>
                           </div>
                           <div class="card-body ">

                           {!! Form::open(['route' => 'sales.store','enctype'=>'multipart/form-data','id'=>'myform']) !!}
                                    <div class="row">
                                        @include('sales.fields')
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

