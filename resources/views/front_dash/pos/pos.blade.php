@extends('pos_layouts.app')
@section('title')
   POS
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row" style="margin-top: 50px;">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2" >
                        <div class="card-stats">
                            <div class="card-stats-title">Overall Statistics -
                                <div class="dropdown d-inline">
                                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">{{$month}}</a>
                                </div>
                            </div>
                            <div class="card-stats-items">
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$productCount}}</div>
                                    <div class="card-stats-item-label">Total Products</div>
                                </div>
                                <div class="card-stats-item">
                                    <div class="card-stats-item-count">{{$lowproductCount}}</div>
                                    <div class="card-stats-item-label">Low Stock</div>
                                </div>

                            </div>
                        </div>
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Sales</h4>
                            </div>
                            <div class="card-body">
                                {{$salesCount}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card card-statistic-2">

                        <div class="card-icon">

                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Today's Sales </h4> <h3>Tk. {{ number_format($dSales, 2) }}</h3>
                            </div><br>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

