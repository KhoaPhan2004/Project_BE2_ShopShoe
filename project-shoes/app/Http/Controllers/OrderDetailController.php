<?php

namespace App\Http\Controllers;
use App\Models\Product; 
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    // Hiển thị form thêm Order Detail
    public function create()
    {
        $products = Product::all();
        return view('admin.order_details.create')->with('products', $products);
    }
    
    public function index()
    {
        $orderDetails = OrderDetail::paginate(10); // Số lượng mục trên mỗi trang
        return view('admin.order_details.index', compact('orderDetails'));
    }

    public function edit($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $products = Product::all();
        return view('admin.order_details.edit', compact('orderDetail', 'products'));
    }

    public function update(Request $request, $id)
    {
    // Validate the request data
    $validatedData = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'product_id' => 'required|integer',
        'quantity' => 'required|integer',
    ]);

    // Tìm chi tiết đơn hàng cần cập nhật
    $orderDetail = OrderDetail::findOrFail($id);

    // Cập nhật thông tin chi tiết đơn hàng
    $orderDetail->update([
        'order_id' => $validatedData['order_id'],
        'product_id' => $validatedData['product_id'],
        'quantity' => $validatedData['quantity'],
    ]);

    // Redirect về trang danh sách chi tiết đơn hàng
    return redirect()->route('order_details.index')->with('success', 'Order detail updated successfully');
    }

    // Xử lý việc thêm Order Detail
    public function store(Request $request)
    {
    // Validate the request data
    $validatedData = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'product_id' => 'required|integer',
        'quantity' => 'required|integer',
    ]);

    // Create a new order detail record
    $orderDetail = OrderDetail::create([
        'order_id' => $validatedData['order_id'],
        'product_id' => $validatedData['product_id'],
        'quantity' => $validatedData['quantity'],
    ]);

    // Return response
    return redirect()->route('order_details.create')->with('success', 'Order detail added successfully');
    }
    // Xóa Order Detail
    public function destroy($id)
    {
    // Tìm chi tiết đơn hàng cần xóa
    $orderDetail = OrderDetail::findOrFail($id);

    // Xóa chi tiết đơn hàng
    $orderDetail->delete();

    // Redirect về trang danh sách chi tiết đơn hàng
    return redirect()->route('order_details.index')->with('success', 'Order detail deleted successfully');
    }

}
