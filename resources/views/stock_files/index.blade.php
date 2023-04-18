@extends('report_layouts.app')
@section('title')
    Stock Files
@endsection
@section('content')
    <section class="section">
    <div class="section-body">
        <div class="card" style="margin-top: 50px;">
            <div class="card-header d-flex justify-content-between">
                <h3 class="page__heading m-0"> Stock Files </h3>
                <div>                    &nbsp;
                    <a href="{{ route('stockFiles.create') }}" class="btn btn-primary form-btn">Stock Files <i class="fas fa-plus"></i></a>

                </div>
            </div>
            <div class="card-body">
                @include('stock_files.table')
            </div>
       </div>
   </div>

    </section>
@endsection

