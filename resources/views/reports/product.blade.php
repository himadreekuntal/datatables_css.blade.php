@extends('report_layouts.app')
@section('title')
    Product Wise Report
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Product Wise Report </h3>
                <div>                    &nbsp;
                    <a href="{{ route('reports.index') }}" class="btn btn-primary form-btn">Back</a>

                </div>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'displayProductReport', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf
                                    <div class="form-group col-sm-6">
                                        <select name="product_id" id="product_id" class="product_id selectpicker form-control" data-actions-box="true"  data-live-search="true" , data-done-button="true">
                                        <option value="">Choose Product</option>
                                            @foreach($products as $r)
                                            <option value="{!! $r->id !!}">{!! $r->product !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

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

