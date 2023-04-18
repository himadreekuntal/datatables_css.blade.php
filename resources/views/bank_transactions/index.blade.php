@extends('finance_layouts.app')
@section('title')
    Bank Transactions
@endsection
@section('content')
    <section class="section">

    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Bank Transaction</h3>
                <div>                    &nbsp;
                    <a href="{{ route('bankTransactions.create') }}" class="btn btn-primary form-btn">Bank Transaction <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('bank_transactions.table')
            </div>
       </div>
   </div>

    </section>
@endsection

