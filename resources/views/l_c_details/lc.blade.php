@extends('other_layouts.app')
@section('title')
   LC Report
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">LC Report </h3>
                <div>                    &nbsp;
                    <a href="{{ route('lCDetails.index') }}" class="btn btn-primary form-btn">Back</a>

                </div>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'displayLCReport', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('start_date', 'Start Date:') !!}
                                        {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
                                    </div>

                                        @push('scripts')
                                        <script type="text/javascript">
                                                $('#start_date').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                    useCurrent: true,
                                                    icons: {
                                                        up: "icon-arrow-up-circle icons font-2xl",
                                                        down: "icon-arrow-down-circle icons font-2xl"
                                                    },
                                                    sideBySide: true
                                                })
                                            </script>
                                      @endpush


                                      <div class="form-group col-sm-6">
                                        {!! Form::label('end_date', 'End Date:') !!}
                                        {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
                                    </div>

                                        @push('scripts')
                                        <script type="text/javascript">
                                                $('#end_date').datetimepicker({
                                                    format: 'YYYY-MM-DD',
                                                    useCurrent: true,
                                                    icons: {
                                                        up: "icon-arrow-up-circle icons font-2xl",
                                                        down: "icon-arrow-down-circle icons font-2xl"
                                                    },
                                                    sideBySide: true
                                                })
                                            </script>
                                      @endpush

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                            <a href="{{ route('reports.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>

                            {!! Form::close() !!}
            </div>
       </div>
   </div>

    </section>
@endsection

