@extends('finance_layouts.app')
@section('title')
    Edit Daily Expenditure
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
                                 <h3 class="page__heading m-0">Edit Daily Expenditure</h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('dailyExpenditures.index') }}" class="btn btn-primary form-btn">Back</a>

                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($dailyExpenditure, ['route' => ['dailyExpenditures.update', $dailyExpenditure->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('daily_expenditures.fieldsedit')
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
