@extends('layouts.app')
@section('title')
   Dashboard
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
              <div class="card card-statistic-2">
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
            <div class="col-lg-9 col-md-9 col-sm-12">
              <div class="card card-statistic-2">

                <div class="card-icon">

                </div>
                <div class="card-wrap">
                  <div class="card-header">
                      <h4>Today's Sales </h4> <h3>Tk. {{ number_format($dSales, 2) }}</h3>
                  </div><br>
                  <div class="card-body">
                      <canvas id="bar-chart" style="height:40vh; width:80vw"></canvas>


                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Monthly Sales</h4>
                </div>
                <div class="card-body">
                    <canvas id="line-chart" style="height:40vh; width:80vw"></canvas>
                </div>
              </div>
            </div>
          </div>
    </section>
@endsection
@section('scripts')
    <script>

        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        const dates = cData.label;
        const convertDate = dates.map(date => new Date(date));
        const datapoints = cData.sales;
        var element = document.getElementById('btn')
        var start;
        var end;



        start = new Date();
        end = new Date();


        start.setDate(start.getDate() - 7); // set to 'now' minus 7 days.
        start.setHours(0, 0, 0, 0);
console.log(start);

        var data = {
            labels: dates,
            datasets: [
                {
                    label: "Sales",
                    data: datapoints,
                    yAxisID: 'y',
                    backgroundColor: 'rgb(75, 192, 192)',
                    tension: 1,
                }
                ]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                responsive: true,
                elements: {
                    point:{
                        radius: .5
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    zoom: {
                        pan: {
                            enabled: true,
                            mode: 'xy',
                        },
                        zoom:{
                            wheel:{
                                enabled: true,
                            }
                        },
                        limits: {
                            x: {
                                minRange: 200
                            },
                        },

                    },

                    title: {
                        display: true,
                        text: 'Sales Data for ',
                    }
                },
                scales: {
                    x: {
                        min: start,
                        max: end,
                        position: 'bottom',
                        type: 'time',
                        ticks: {
                            autoSkip: true,
                            autoSkipPadding: 15,
                            maxRotation: 10,
                            maxTicksLimit: 5,

                        },
                        time: {

                            unit: 'day'

                        },
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        type: 'linear',

                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Water Level(cm)'
                        }

                    },
                        // grid line settings


                }
            }
        };


        //create Pie Chart class object
        const chart1 = new Chart(
            document.getElementById('bar-chart'),
            config
        );



// 2nd graph


        var cData1 = JSON.parse(`<?php echo $chart_data_1; ?>`);
      //  console.log(cData1)
        const dates1 = cData1.label1;
        const datapoints1 = cData1.sales1;
       // console.log(datapoints1);
      //  console.log(dates1);


        var data1 = {
            labels: dates1,
            datasets: [
                {
                    label: "Sales",
                    data: datapoints1,
                    yAxisID: 'y',
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 1,
                }
            ]
        };
     //   console.log(data1);

        var configline = {
            type: 'line',
            data:data1,
            options: {
                responsive: true,
                elements: {
                    point:{
                        radius: 5
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    zoom: {
                        pan: {
                            enabled: true,
                            mode: 'xy',
                        },
                        zoom:{
                            wheel:{
                                enabled: true,
                            }
                        },
                        limits: {
                            x: {
                                minRange: 200
                            },
                        },

                    },

                    title: {
                        display: true,
                        text: 'Monthly Sales Data  ',
                    }
                },
                scales: {
                    x: {

                        position: 'bottom',
                        ticks: {
                            autoSkip: true,
                            autoSkipPadding: 150,
                            maxRotation: 100,
                            maxTicksLimit: 5,

                        },
                        time: {

                            unit: 'day',


                        },
                        title: {
                            display: true,
                            text: 'Time'
                        }

                    },
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Water Level(cm)'
                        },
                        ticks: {
                            autoSkip: true,
                            autoSkipPadding: 150,
                            maxRotation: 100,
                            maxTicksLimit: 5,

                        },

                    },
                    // grid line settings


                }
            }
        };
        //create Pie Chart class object
        const chart2 = new Chart(
            document.getElementById('line-chart'),
            configline
        );

    </script>
@endsection


