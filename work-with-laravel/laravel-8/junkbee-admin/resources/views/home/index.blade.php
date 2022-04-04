@extends('layout.main')

@section('content')
    <h2><b>Preview Data</b></h2>
    <div class="row">
        <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="materialRecycled" class="d-inline">0</h3>
                    <h3 class="d-inline">Kg</h3>
                    <p>Material Recycled</p>
                </div>
                <div class="icon">
                    <i class="fas fa-recycle"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="treeSaved" class="d-inline">0</h3>

                    <p>Tree Saved</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tree"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 id="collectionMade" class="d-inline">0</h3>

                    <p>Collection made</p>
                </div>
                <div class="icon">
                    <i class="fas fa-angle-double-right"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- AREA CHART -->
            <div class="card card-light bg-light">
                <div class="card-header">
                    <h3 class="card-title">Order Statistic</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form id="searchForm" method="post">
                    @csrf
                    <div class="row mt-3 mx-3">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control" id="orderStatus">
                                    <option value="completed">Completed</option>
                                    <option value="cenceled">Cenceled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">

                            <div class="form-group">
                                <input type="date" class="form-control" id="start" name="start">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="date" class="form-control" id="finish" name="finish">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning "><i class="fas fa-search "></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                        </canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- AREA CHART -->
            <div class="card card-light bg-light">
                <div class="card-header">
                    <h3 class="card-title">User Statistic</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{ route('userStatistic') }}" id="userSearch" method="post">
                    @csrf
                    <div class="row mt-3 mx-3">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control" id="role">
                                    <option value="all">All</option>
                                    <option value="user">User</option>
                                    <option value="beever">Beever</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">

                            <div class="form-group">
                                <input type="date" class="form-control" id="userstart" name="start">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="date" class="form-control" id="userfinish" name="finish">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning "><i class="fas fa-search "></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="userChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                        </canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- AREA CHART -->
            <div class="card card-light bg-light">
                <div class="card-header">
                    <h3 class="card-title">Colection Statistic</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form action="{{ route('collectionStatistic') }}" id="collectionSearch" method="post">
                    @csrf
                    <div class="row mt-3 mx-3">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <select class="form-control" id="type" name="type">
                                    <option value="plastic">Plastic</option>
                                    <option value="paper">Paper</option>
                                    <option value="glass">Glass</option>
                                    <option value="sachet">Sachet</option>
                                    <option value="metal">Metal</option>
                                    <option value="waste oil">Waste Oil</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">

                            <div class="form-group">
                                <input type="date" class="form-control" id="collectionstart" name="start">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="date" class="form-control" id="collectionfinish" name="finish">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning "><i class="fas fa-search "></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="collectionChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                        </canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $(function() {
            //--------------
            //- Order Statistic-CHART -
            //--------------

            $.get("{{ route('defaultorderStatistic') }}", function(data, status) {
                $.map(data, function(v, i) {

                    // console.log(v, i);
                    chart.data.labels.push(i);
                    chart.data.datasets[0].data.push(v);
                    chart.update();
                });
            });
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            var chart = new Chart(areaChartCanvas, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        label: '',
                        backgroundColor: 'rgba(255, 193, 7, 0.5)',
                        borderColor: 'rgba(255, 193, 7, 0.5)',
                        pointRadius: true,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        smooth: false,
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        position: 'bottom',
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }]
                    },
                    elements: {
                        line: {
                            tension: 0
                        }
                    }
                },
            });
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('orderStatistic') }}",
                    method: 'post',
                    data: {
                        start: $('#start').val(),
                        finish: $('#finish').val(),
                        orderStatus: $('#orderStatus').val(),
                    },
                    success: function(result) {

                        $.map(result, function(v, i) {
                            setTimeout(updateChart, 500);

                            function updateChart() {
                                chart.data.labels.push(i);
                                chart.data.datasets[0].data.push(v);
                                chart.update();
                            }
                            // location.reload()
                            let total = chart.data.labels.length;

                            while (total >= 0) {
                                chart.data.labels.pop();
                                chart.data.datasets[0].data.pop();
                                total--;
                            }
                            chart.update();
                        });
                    }
                });
            })
        })

        $(function() {
            //--------------
            //- Order Statistic-CHART -
            //--------------

            $.get("{{ route('defaultuserStatistic') }}", function(data, status) {
                $.map(data, function(v, i) {
                    chart.data.labels.push(i);
                    chart.data.datasets[0].data.push(v);
                    chart.update();
                });
            });
            var areaChartCanvas = $('#userChart').get(0).getContext('2d')
            var chart = new Chart(areaChartCanvas, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        label: '',
                        backgroundColor: 'rgba(255, 193, 7, 0.5)',
                        borderColor: 'rgba(255, 193, 7, 0.5)',
                        pointRadius: true,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        smooth: false,
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        position: 'bottom',
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }]
                    },
                    elements: {
                        line: {
                            tension: 0
                        }
                    }
                },
            });
            $('#userSearch').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('userStatistic') }}",
                    method: 'post',
                    data: {
                        start: $('#userstart').val(),
                        finish: $('#userfinish').val(),
                        role: $('#role').val(),
                    },
                    success: function(result) {

                        $.map(result, function(v, i) {
                            setTimeout(updateChart, 501);

                            function updateChart() {
                                chart.data.labels.push(i);
                                chart.data.datasets[0].data.push(v);
                                chart.update();
                            }
                            // location.reload()
                            let total = chart.data.labels.length;

                            while (total >= 0) {
                                chart.data.labels.pop();
                                chart.data.datasets[0].data.pop();
                                total--;
                            }
                            chart.update();
                        });
                    }
                });
            })
        })

        $(function() {
            //--------------
            //- Order Statistic-CHART -
            //--------------
            $.get("{{ route('defaultcollectionStatistic') }}", function(data, status) {
                $.map(data, function(v, i) {
                    chart.data.labels.push(i);
                    chart.data.datasets[0].data.push(v);
                    chart.update();
                });
            });
            var areaChartCanvas = $('#collectionChart').get(0).getContext('2d')
            var chart = new Chart(areaChartCanvas, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        label: '',
                        backgroundColor: 'rgba(255, 193, 7, 0.5)',
                        borderColor: 'rgba(255, 193, 7, 0.5)',
                        pointRadius: true,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        smooth: false,
                        fill: false
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        position: 'bottom',
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: true,
                            }
                        }]
                    },
                    elements: {
                        line: {
                            tension: 0
                        }
                    }
                },
            });
            $('#collectionSearch').on('submit', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('collectionStatistic') }}",
                    method: 'post',
                    data: {
                        start: $('#collectionstart').val(),
                        finish: $('#collectionfinish').val(),
                        type: $('#type').val(),
                    },
                    success: function(result) {

                        $.map(result, function(v, i) {
                            setTimeout(updateChart, 501);

                            function updateChart() {
                                chart.data.labels.push(i);
                                chart.data.datasets[0].data.push(v);
                                chart.update();
                            }
                            // location.reload()
                            let total = chart.data.labels.length;

                            while (total >= 0) {
                                chart.data.labels.pop();
                                chart.data.datasets[0].data.pop();
                                total--;
                            }
                            chart.update();
                        });


                    }
                });
            })
        })

        $(function() {
            $.get("{{ route('collectionMade') }}", function(data, status) {
                $('#collectionMade').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: data
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            });

            $.get("{{ route('materialRecycled') }}", function(data, status) {
                $('#materialRecycled').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: data
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            });
            $.get("{{ route('treeSaved') }}", function(data, status) {
                $('#treeSaved').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: data
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            });
        })
    </script>

@endsection
