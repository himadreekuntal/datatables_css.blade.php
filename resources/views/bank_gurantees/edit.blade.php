@extends('other_layouts.app')
@section('title')
    Edit Bank Gurantee
@endsection
@section('content')
    <section class="section">

  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card" style="margin-top: 50px;">
                             <div class="card-header d-flex justify-content-between">
                                 <h3 class="page__heading m-0">Bank Guarantee Edit</h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('bankGurantees.index') }}" class="btn btn-primary form-btn">Back </a>
                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($bankGurantee, ['route' => ['bankGurantees.update', $bankGurantee->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
                                 @csrf
                                        <div class="row">
                                            @include('bank_gurantees.fieldsedit')
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
