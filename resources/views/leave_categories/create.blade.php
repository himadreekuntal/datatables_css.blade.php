@extends('hrm_layouts.app')
@section('title')
    Create Leave Category
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
                               <h3 class="page__heading m-0">Create Leave Categories </h3>
                               <div>                    &nbsp;
                                   <a href="{{ route('leaveCategories.index') }}" class="btn btn-primary form-btn">Back</a>

                               </div>
                           </div>
                           <div class="card-body ">
                                {!! Form::open(['route' => 'leaveCategories.store']) !!}
                                    <div class="row">
                                        @include('leave_categories.fields')
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
