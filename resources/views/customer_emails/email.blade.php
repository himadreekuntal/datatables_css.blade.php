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
                                <h3 class="page__heading m-0"> Email</h3>
                                <div>                    &nbsp;
                                    <a href="{{ route('customerEmails.index') }}" class="btn btn-primary form-btn">Back </a>
                                </div>
                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => 'sendEmail','enctype'=>'multipart/form-data']) !!}
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('group_name', 'Group Name:') !!}
                                        <input type="text" name="group_name" id="group_name" class="form-control" value="{{$customerEmail->category}}">
                                        <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}">
                                    </div>

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('mail_subject', 'Mail Subject:') !!}
                                        <input type="text" name="mail_subject" id="mail_subject" class="form-control">
                                    </div>

                                    <div class="input-group control-group increment">
                                        {!! Form::label('mail_attach', 'Attachment:') !!}
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>

                                    <div class="clone" hidden>
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="file" name="filename[]" class="form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        {!! Form::label('mail_body', 'Mail Body:') !!}
                                        <textarea type="text" name="mail_body" id="mail_body" class="form-control"></textarea>

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

@section('scripts')
    <script>

        $('#mail_body').summernote({
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $(".btn-danger").click(function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>
@endsection


