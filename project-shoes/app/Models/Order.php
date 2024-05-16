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
        static::creating(function ($order) {
            self::updateStatistics($order, 'created');
        });
    
        static::updating(function ($order) {
            self::updateStatistics($order, 'updated');
        });
    
        static::deleting(function ($order) {
            self::updateStatisticsAfterDelete($order);
        });
    }
    

    protected static function updateStatistics($order, $action)
    {
        // Chuyển đổi order_date thành dạng Carbon
        $orderDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->startOfDay();

        // Tìm hoặc tạo bản ghi thống kê
        $statistic = Statistic::firstOrNew(['order_date' => $orderDate]);

        if ($action === 'created') {
            // Cập nhật khi tạo mới đơn hàng
            $statistic->profit += $order->total_amount;
            $statistic->total_order += 1;
            $statistic->quantity += 1;
        } elseif ($action === 'deleted') {
            // Cập nhật khi xóa đơn hàng
            $statistic->profit -= $order->total_amount;
            $statistic->total_order -= 1;
            $statistic->quantity -= 1;
        } elseif ($action === 'updated') {
          
            $originalOrder = $order->getOriginal();
            $statistic->profit -= $originalOrder['total_amount'];
            $statistic->profit += $order->total_amount;
        }

        $statistic->save();
    }

    protected static function updateStatisticsAfterDelete($order)
    {
        // Chuyển đổi order_date thành dạng Carbon
        $orderDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date)->startOfDay();
    
        // Tìm bản ghi thống kê
        $statistic = Statistic::where('order_date', $orderDate)->first();
    
        if ($statistic) {
            // Cập nhật thống kê
            $statistic->profit -= $order->total_amount;
            $statistic->total_order -= 1;
            $statistic->quantity -= 1;
    
            $statistic->save();
        }
    }
    
}
