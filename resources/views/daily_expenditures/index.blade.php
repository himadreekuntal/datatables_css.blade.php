@extends('finance_layouts.app')
@section('title')
    Daily Expenditures
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Balance</h3>
                <div>                    &nbsp;
                    <a href="{{ route('dailyExpenditures.create') }}" class="btn btn-primary form-btn">Daily Expenditure <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('daily_expenditures.table')
            </div>
       </div>
   </div>

    </section>
@endsection

