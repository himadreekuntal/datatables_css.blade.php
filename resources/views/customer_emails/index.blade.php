@extends('other_layouts.app')
@section('title')
    Customer Emails
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">New Customer Email</h3>
                <div>                    &nbsp;
                    <a href="{{ route('customerEmails.create') }}" class="btn btn-primary form-btn">Customer Email <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body">
                @include('customer_emails.table')
            </div>
       </div>
   </div>

    </section>
@endsection

