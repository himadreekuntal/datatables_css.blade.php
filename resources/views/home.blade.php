
@extends('layouts.dashapp')
@section('title')
    Dashboard
@endsection

@section('content')


     <div class="container dynamicTile">
        <div class="row ">
            <a class="nav-link" href="{{route('pos')}}">
                <div class="col-sm-3 col-xs-4">
                    <div id="tile8" class="tile">
                      <i class="fas fa-boxes"></i>
                      <span class="menu-title">POS</span>
                  </div>
                </div>
            </a>
            <a class="nav-link" href="{{route('hrm')}}">
                <div class="col-sm-3 col-xs-4">
                    <div id="tile8" class="tile1">
                        <i class="las la-user-friends"></i>
                        <span class="menu-title">HRM</span>
                    </div>
                </div>
            </a>
            <a class="nav-link" href="{{route('finance')}}">
                <div class="col-sm-3 col-xs-4">
                    <div id="tile8" class="tile2">
                        <i class="las la-coins"></i>
                        <span class="menu-title">Finance</span>
                    </div>
                </div>
            </a>
            <a class="nav-link" href="{{route('report')}}">
                <div class="col-sm-3 col-xs-4">
                    <div id="tile8" class="tile3">
                        <i class="las la-file-pdf"></i>
                        <span class="menu-title">Reports</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="row">
            <div class="col-sm-8 col-xs-4">
                <div id="tile7" class="tile4">
                    <div class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <canvas id="bar-chart" style="height:25vh; width:30vw"></canvas>
                            </div>
                            <div class="item">
                                <canvas id="line-chart" style="height:25vh; width:30vw"></canvas>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <a class="nav-link" href="{{route('other')}}">
                <div class="col-sm-2 col-xs-4">
                    <div id="tile8" class="tile6">
                        <i class="las la-building"></i>
                        <span class="menu-title">Others</span>
                    </div>
                </div>
            </a>
            <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
               onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                <div class="col-sm-2 col-xs-4">
                    <div id="tile8" class="tile5">
                        <i class="fas fa-sign-out-alt"></i>
                         <span class="menu-title">Log Out</span>
                    </div>
                </div>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </a>
        </div>
    </div>

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







