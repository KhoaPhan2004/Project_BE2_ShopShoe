<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Statistic;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'order_date', 'status', 'address', 'total_amount',
    ];

    protected static function booted()
    {
        static::saving(function ($order) {
            self::updateStatistics($order, 'saving');
        });

        static::updated(function ($order) {
            self::updateStatistics($order, 'updated');
        });

        static::deleted(function ($order) {
            self::updateStatisticsAfterDelete($order);
        });
    }

    protected static function updateStatistics($order, $action)
    {
        if ($action === 'saving') {
            // Kiểm tra xem đơn hàng đã được lưu vào cơ sở dữ liệu chưa
            if (!$order->exists) {
                return;
            }
        }
        // Lấy ngày hiện tại của đơn hàng
        $orderDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->startOfDay();

        // Tìm hoặc tạo một bản ghi thống kê cho ngày này
        $statistic = Statistic::firstOrNew(['order_date' => $orderDate]);

        if ($action === 'created') {
            // Tạo mới
            $statistic->profit += $order->total_amount;
            $statistic->total_order += 1;
            $statistic->quantity += 1; 
        } elseif ($action === 'deleted') {
            // Xóa đơn hàng
            $statistic->profit -= $order->total_amount;
            $statistic->total_order -= 1;
            $statistic->quantity -= 1;
        } else {
            // Cập nhật đơn hàng
            // Có thể thêm logic cập nhật ở đây nếu cần thiết
        }
        // dd($statistic);

        $statistic->save();
    }
    protected static function updateStatisticsAfterDelete($order)
{
    // Lấy ngày đặt hàng của đơn hàng đã xóa
    $orderDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->startOfDay();

    // Tìm bản ghi thống kê cho ngày đó
    $statistic = Statistic::where('order_date', $orderDate)->first();

    if ($statistic) {
        // Cập nhật dữ liệu thống kê
        $statistic->profit -= $order->total_amount;
        $statistic->total_order -= 1;
        $statistic->quantity -= 1; // giả sử quantity là số lượng đơn hàng

        $statistic->save();
    }
}
}
