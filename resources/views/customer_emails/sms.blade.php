@extends('other_layouts.app')
@section('title')
    Send Group Email
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
                                <h3 class="page__heading m-0">Send SMS</h3>
                                <div>                    &nbsp;
                                    <a href="{{ route('customerEmails.index') }}" class="btn btn-primary form-btn">Back </a>
                                </div>
                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => 'sendSms']) !!}
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('group_name', 'Group Name:') !!}
                                        <input type="text" name="group_name" id="group_name" class="form-control" value="{{$customerEmail->category}}">
                                        <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}">
                                    </div>

                                    <div class="form-group col-sm-12">
                                        {!! Form::label('sms_body', 'SMS Body:') !!}
                                        <input type="text" rows="40" cols="50"  name="sms_body" id="sms_body" class="form-control">



                                    </div>
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('customerEmails.index') }}" class="btn btn-light">Cancel</a>
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




