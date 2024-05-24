<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where('product_name', 'like', "%$keyword%")->get();
        return view('search_results', compact('products'))->render();
    }
}
