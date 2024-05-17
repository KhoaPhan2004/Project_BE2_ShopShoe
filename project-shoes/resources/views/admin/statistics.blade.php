@extends('admin.admin')
@section('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<style>
    .bg-aqua {
        background-color: aqua;
        color: #fff;
    }

    .bg-green {
        background-color: green;
        color: #fff;
    }

    .bg-yellow {
        background-color: yellow;
        color: #000;
    }

    .bg-red {
        background-color: red;
        color: #fff;
    }
    .header{
        margin-bottom: 200px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6 ">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$product_count}}</h3>
                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.product.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$brand_count}}</h3>
                    <p>Brand Count</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.brand.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$order_count}}</h3>
                    <p>Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$origin_count}}</h3>
                    <p>Origin</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('admin.origin.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row header">
        <h1>Thống Kê Doanh Thu</h1>
        <div class="col-lg-2">
            <select class="dashboard-filter form-control" name="" id="dashboard-filter">
                <option value="">Chọn</option>
                <option value="7 ngay">7 ngày</option>
                <option value="thang truot">Tháng trước</option>
                <option value="thang nay">Tháng này</option>
                <option value="1 nam">1 năm</option>
            </select>

        </div>
        <div class="col-lg-8">

            <div class="date_time">
                <div class="row">
                <div class="col-lg-6">
                    <span>Từ Ngày</span>
                    <input type="date" id="start-date">
                </div>
                <div class="col-lg-6">
                    <span>Tới Ngày</span>
                    <input type="date" id="end-date">
                    <input type="button" class="btn btn-primary" value="Lọc kết quả" name="" id="filter-button">
                </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

    </div>

    <div class="chart-container">
        <div id="myfirstchart" style="height: 250px;"></div>

    </div>
</div>

<script>
    //  để lưu trữ biểu đồ
    var myChart;

    $(document).ready(function() {
    initializeChart();

    function filterStatistics() {
        var selectedOption = $('#dashboard-filter').val();
        var startDate = $('#start-date').val();
        var endDate = $('#end-date').val();

        if (selectedOption) {
            // chọn lọc theo dropdown
            $.ajax({
                url: '/filter-statistics',
                method: 'GET',
                data: {
                    option: selectedOption
                },
                success: function(response) {
                    response.sort(function(a, b) {
                        return new Date(a.order_date.split('/').reverse().join('/')) - new Date(b.order_date.split('/').reverse().join('/'));
                    });
                    updateChartData(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else if (startDate && endDate) {
            // nhập start và end nhá
            $.ajax({
                url: '/filter-statistics',
                method: 'GET',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    response.sort(function(a, b) {
                        return new Date(a.order_date.split('/').reverse().join('/')) - new Date(b.order_date.split('/').reverse().join('/'));
                    });
                    updateChartData(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    }

    // Sự kiện thay đổi cho dropdown
    $('#dashboard-filter').change(filterStatistics);

    // Sự kiện click cho nút lọc
    $('#filter-button').click(filterStatistics);
});


    function initializeChart() {
        myChart = new Morris.Bar({
            element: 'myfirstchart',
            data: @json($data),
            xkey: 'order_date',
            ykeys: ['profit', 'total_order'],
            labels: ['Lợi Nhuận', 'Tổng Đơn Hàng'],
            hideHover: 'auto',
            resize: true,
            barColors: ['#0b62a4', '#7a92a3'],
        });
    }

    function updateChartData(data) {
        myChart.setData(data);
    }
</script>


@stop()