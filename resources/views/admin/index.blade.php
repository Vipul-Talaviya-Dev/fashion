@extends('admin.layouts.main')

@section('title')
    Dashboard panel
@endsection

@section('css')
    <style>
        #chartDiv {
            /*width: 100%;*/
            height: 250px;
            font-size: 10px;
        }

        #monthDiv {
            /*width: 100%;*/
            height: 250px;
            font-size: 10px;
        }

        .doughnut1 {
            border: 10px solid #55D1D1;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut2 {
            border: 10px solid #C2B3E1;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut3 {
            border: 10px solid #77BFEF;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut4 {
            border: 10px solid #FFC59B;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut5 {
            border: 10px solid #DF9398;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut6 {
            border: 10px solid #EBD650;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }
    </style>
@endsection

@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content area -->
    <div class="row">
        <div class="col-lg-12" id="week">
            <div class="panel panel-flat">
                <div id="change">
                    <div class="panel-heading">
                        <h5 class="panel-title">Chart</h5>
                        <button id="chart" class="btn">Switch Graph</button>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div id="chartDiv"></div>
                        <div id="monthDiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">History</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4" align="center">
                        <div class="doughnut1">
                            <h6 style="color:#55D1D1; margin-top: 25px">Male Users</h6>
                            <h6 style="color:#55D1D1">{{ $male }}</h6>
                        </div>
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="doughnut2">
                            <h6 style="color:#C2B3E1; margin-top: 25px">Female Users</h6>
                            <h6 style="color:#C2B3E1">{{ $female }}</h6>
                        </div>
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="doughnut3">
                            <h6 style="color:#77BFEF; margin-top: 25px">Wallet Point</h6>
                            <h6 style="color:#77BFEF">{{ $walletPoints }}</h6>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-4" align="center">
                        <div class="doughnut4">
                            <h6 style="color:#FFC59B; margin-top: 25px">Sellers</h6>
                            <h6 style="color:#FFC59B">{{ $seller }}</h6>
                        </div>
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="doughnut5">
                            <h6 style="color:#DF9398; margin-top: 25px">Products</h6>
                            <h6 style="color:#DF9398">{{ $product }}</h6>
                        </div>
                    </div>
                    <div class="col-md-4" align="center">
                        <div class="doughnut6">
                            <h6 style="color:#EBD650; margin-top: 25px">Total Sell</h6>
                            <h6 style="color:#EBD650">{{ $order }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Pie chart timeline</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="chart-container has-scroll">
                        <div class="chart has-fixed-height has-minimum-width" id="option"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection


@section('js')

    <!-- Resources -->
    <script type="text/javascript" src="/js/amcharts.js"></script>
    <script type="text/javascript" src="/js/serial.js"></script>
    <script type="text/javascript" src="/js/export.min.js"></script>
    <link href="/css/export.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="/js/light.js"></script>

    <script type="text/javascript" src="/js/FileSaver.min.js"></script>
    <script type="text/javascript" src="/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="/js/fabric.min.js"></script>
    <script type="text/javascript" src="/js/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/3.7.1/echarts.js"></script>
    <script type="text/javascript" src="/assets/js/core/app.js"></script>

    <script>
        $(function () {
            $("#monthDiv").hide();
            $("#chart").on("click", function () {
                $("#chartDiv, #monthDiv").toggle();
            });
        });
    </script>

    <!-- Chart code -->
    <script>
        AmCharts.makeChart("chartDiv", {
            "type": "serial",
            "theme": "light",
            "dataProvider": {!! json_encode($weekGraphData) !!},
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "total"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "date",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
            },
            "export": {
                "enabled": true
            }
        });
    </script>

    <script>
        AmCharts.makeChart("monthDiv", {
            "type": "serial",
            "theme": "light",
            "dataProvider": {!! json_encode($monthGraphData) !!},
            "valueAxes": [{
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            }],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "total"
            }],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "date",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
            },
            "export": {
                "enabled": true
            }
        });
    </script>

    <script>
        $(function () {
            $(function (ec, echart) {

                var pie_timeline = ec.init(document.getElementById('pie_timeline'), echart);

                console.log(pie_timeline);

                var idx = 1;
                pie_timeline_options = {

                    // Add timeline
                    timeline: {
                        x: 10,
                        x2: 10,
                        data: {!! json_encode($months) !!},
                        label: {
                            formatter: function (s) {
                                return s.slice(0, 7);
                            }
                        },
                        autoPlay: true,
                        playInterval: 3000
                    },

                    // Set options
                    options: [
                        {

                            // Add title
                            title: {
                                text: 'Browser statistics',
                                subtext: 'Based on shared research',
                                x: 'center'
                            },

                            // Add tooltip
                            tooltip: {
                                trigger: 'item',
                                formatter: "{a} <br/>{b}: {c} ({d}%)"
                            },

                            // Add legend
                            legend: {
                                x: 'left',
                                orient: 'vertical',
                                data: ['BuyNow', 'PickFromStore', 'TryAtHome']
                            },

                            // Display toolbox
                            toolbox: {
                                show: true,
                                orient: 'vertical',
                                feature: {
                                    mark: {
                                        show: true,
                                        title: {
                                            mark: 'Markline switch',
                                            markUndo: 'Undo markline',
                                            markClear: 'Clear markline'
                                        }
                                    },
                                    dataView: {
                                        show: true,
                                        readOnly: false,
                                        title: 'View data',
                                        lang: ['View chart data', 'Close', 'Update']
                                    },
                                    magicType: {
                                        show: true,
                                        title: {
                                            pie: 'Switch to pies',
                                            funnel: 'Switch to funnel',
                                        },
                                        type: ['pie', 'funnel'],
                                        option: {
                                            funnel: {
                                                x: '25%',
                                                width: '50%',
                                                funnelAlign: 'left',
                                                max: 1700
                                            }
                                        }
                                    },
                                    restore: {
                                        show: true,
                                        title: 'Restore'
                                    },
                                    saveAsImage: {
                                        show: true,
                                        title: 'Same as image',
                                        lang: ['Save']
                                    }
                                }
                            },

                            // Add series
                            series: [{
                                name: 'Browser',
                                type: 'pie',
                                center: ['50%', '50%'],
                                radius: '60%',
                                data: [
                                    {value: idx * 128 + 80, name: 'BuyNow'},
                                    {value: idx * 64 + 160, name: 'PickFromStore'},
                                    {value: idx * 32 + 320, name: 'TryAtStore'},
                                ]
                            }]
                        },

                        {
                            series: [{
                                name: 'Browser',
                                type: 'pie',
                                data: [
                                    {value: idx * 128 + 80, name: 'BuyNow'},
                                    {value: idx * 64 + 160, name: 'PickFromStore'},
                                    {value: idx * 32 + 320, name: 'TryAtHome'},
                                ]
                            }]
                        },
                        {
                            series: [{
                                name: 'Browser',
                                type: 'pie',
                                data: [
                                    {value: idx * 128 + 80, name: 'BuyNow'},
                                    {value: idx * 64 + 160, name: 'PickFromStore'},
                                    {value: idx * 32 + 320, name: 'TryAtStore'},
                                ]
                            }]
                        },
                        {
                            series: [{
                                name: 'Browser',
                                type: 'pie',
                                data: [
                                    {value: idx * 128 + 80, name: 'BuyNow'},
                                    {value: idx * 64 + 160, name: 'PickFromStore'},
                                    {value: idx * 32 + 320, name: 'TryAtStore'},
                                ]
                            }]
                        }
                    ]
                };
                window.onresize = function () {
                    setTimeout(function () {
                        pie_timeline.resize();
                    }, 200);
                }
            });

        });
    </script>


@endsection
