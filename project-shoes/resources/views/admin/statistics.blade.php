@extends('admin.admin')
@section('main')

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('js/thongke.js') }}" rel="stylesheet">

<style>
    .dropdown-menu {
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <h1>Thống Kê Doanh Thu</h1>
            <div class="nav-depart">
                <div class="depart-btn">
                    <span>Thống kê theo ngày</span>
                    <i class="bi bi-list"></i>
                    <ul class="dropdown-menu">
                        <li><a href="#">Thống kê theo tuần</a></li>
                        <li><a href="#">Thống kê theo tháng</a></li>
                        <li><a href="#">Thống kê theo năm</a></li>
                    </ul>
                </div>

            </div>
            <div class="date_time">
                <div class="row">
                    <div class="col-lg-6">
                        <span>Từ Ngày</span>
                        <input type="date">
                    </div>
                    <div class="col-lg-6">
                        <span>Tới Ngày</span>

                        <input type="date">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <!-- Đây có thể là nội dung cho phần cột bên phải nếu cần -->
        </div>
    </div>
    <div class="chart-container">
        <div id="myfirstchart" style="height: 250px;"></div>

    </div>
</div>

<script>
  
    new Morris.Bar({
        element: 'myfirstchart',
        data: <?php echo json_encode($data); ?>, // Sử dụng dữ liệu từ biến $data
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value']
    });

    // JavaScript để xử lý sự kiện khi click vào biểu tượng dropdown
    $(document).ready(function() {
        $('.bi-list').click(function() {
            $('.dropdown-menu').toggle();
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('.depart-btn').length) {
                $('.dropdown-menu').hide();
            }
        });
    });
</script>
@stop()