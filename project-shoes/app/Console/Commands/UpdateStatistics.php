<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Statistic;
use Carbon\Carbon;
use DB;

class UpdateStatistics extends Command
{
    protected $signature = 'statistics:update';
    protected $description = 'Update statistics based on orders data';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Bật ghi log câu truy vấn SQL
        DB::enableQueryLog();

        // Lấy ngày hiện tại
        $today = Carbon::today();

        // Lấy tất cả các đơn hàng trong ngày hiện tại
        $orders = Order::whereDate('order_date', $today)->get();

        // Tính toán tổng số tiền và số lượng đơn hàng
        $totalAmount = $orders->sum('total_amount');
        $totalOrders = $orders->count();

        // Nếu đã có bản ghi thống kê cho ngày này, cập nhật nó. Nếu không, tạo mới
        $statistic = Statistic::firstOrNew(['order_date' => $today]);
        $statistic->profit = $totalAmount;
        $statistic->total_order = $totalOrders;
        $statistic->quantity = $orders->count(); // giả sử quantity là số lượng đơn hàng
        $statistic->save();

        // Lấy danh sách các câu truy vấn đã được thực thi
        $queryLog = DB::getQueryLog();

        // In ra câu truy vấn SQL
        foreach ($queryLog as $log) {
            $this->info($log['query']);
        }

        $this->info('Statistics updated successfully!');
    }
}
