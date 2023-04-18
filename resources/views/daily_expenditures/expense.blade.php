@extends('finance_layouts.app')
@section('title')
   Expense Details
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Expense Report</h3>
                <div>                    &nbsp;
                    <a href="{{ route('dailyExpenditures.index') }}" class="btn btn-primary form-btn">Back</a>

                </div>
            </div>
            <div class="card-body">
            {!! Form::open(['route' => 'displayExpenseReport', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf

                                    <div class="form-group col-sm-6">
                                        {!! Form::label('start_date', 'Start Date:') !!}
                                        {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date','autocomplete'=>'off']) !!}
                                    </div>




                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                            <a href="{{ route('dailyExpenditures.index') }}" class="btn btn-default">Cancel</a>
                                        </div>
                                    </div>

                            {!! Form::close() !!}
            </div>
       </div>
   </div>

    </section>
@endsection

@section('scripts')
<script>
$("#start_date").datepicker( {
    format: "dd-mm-yyyy",
    startView: "months",
    minViewMode: "months"
});
</script>
@endsection
