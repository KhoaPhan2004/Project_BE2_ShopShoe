<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Tìm kiếm sản phẩm theo tên hoặc hãng
        $products = Product::select('products.*', 'origins.origin_name AS origin')
            ->join('origins', 'products.origin_id', '=', 'origins.id')
            ->where(function ($query) use ($keyword) {
                $query->where('products.product_name', 'like', "%$keyword%")
                      ->orWhere('origins.origin_name', 'like', "%$keyword%");
            })
            ->get();

        // Trả về view hiển thị kết quả tìm kiếm
        return view('search_results', ['products' => $products]);
    }
    
}
