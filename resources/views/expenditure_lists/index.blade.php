@extends('finance_layouts.app')
@section('title')
    Expenditure Lists
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0">Expenditure List</h3>
                <div>                    &nbsp;
                    <a href="{{ route('expenditureLists.create') }}" class="btn btn-primary form-btn">Expenditure List <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('expenditure_lists.table')
            </div>
       </div>
   </div>

    </section>
@endsection

