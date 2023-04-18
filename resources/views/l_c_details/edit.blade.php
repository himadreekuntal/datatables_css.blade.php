@extends('other_layouts.app')
@section('title')
    Edit L C Detail
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
                                 <h3 class="page__heading m-0">Edit LC </h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('lCDetails.index') }}" class="btn btn-primary form-btn">Back</a>

                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($lCDetail, ['route' => ['lCDetails.update', $lCDetail->id],'enctype'=>'multipart/form-data' ,'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('l_c_details.fieldsedit')
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
