@extends('hrm_layouts.app')
@section('title')
    Edit Role
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
                                 <h3 class="page__heading m-0">Edit Role </h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('roles.index') }}" class="btn btn-primary form-btn">Back</a>

                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('name', 'Name:') !!}
                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                        </div>

                                        <!-- Status Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('permission', 'Permission:') !!}
                                            @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                            <br/>
                                            @endforeach
                                        </div>

                                        <div class="form-group col-sm-12">
                                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                            <a href="{{ route('roles.index') }}" class="btn btn-light">Cancel</a>
                                        </div>


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
