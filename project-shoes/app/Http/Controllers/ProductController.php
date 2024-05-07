<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $products = Product::orderBy('id', 'DESC')->paginate(50);
    //     return view('admin.product.index', compact('products'));
    // }
    public function index()
    {
        $products = Product::select('products.*', 'brands.brand_name as brand_name', 'origins.origin_name as origin_name')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('origins', 'origins.id', '=', 'products.origin_id')
            ->orderBy('products.id', 'DESC')
            ->paginate(3);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::orderBy('brand_name', 'DESC')->select('id', 'brand_name')->get();
        $origins = Origin::orderBy('origin_name', 'DESC')->select('id', 'origin_name')->get();

        return view('admin.product.create', compact('brands'), compact('origins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra nếu có file_upload trong request
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();

            $file_name = time() . '-' . 'product.' . $ext;

            $file->move(public_path('images'), $file_name);
        }

        $data = [
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'brand_id' => $request->input('brand_id'),
            'origin_id' => $request->input('origin_id'),
            'size' => $request->input('size'),
            'image_url' => isset($file_name) ? $file_name : null,
        ];

        // Tạo một sản phẩm mới và lưu vào cơ sở dữ liệu
        if (Product::create($data)) {
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        } else {
            // Xử lý trường hợp lưu thất bại
        }
    }





    //này dùng fill() để create
    // $product = new Product();

    // // Kiểm tra nếu có file_upload trong request
    // if ($request->has('file_upload')) {
    //     $file = $request->file_upload;
    //     $ext = $request->file_upload->extension();

    //     $file_name = time().'-'.'product.'.$ext;

    //     $file->move(public_path('images'), $file_name);

    //     // Thêm giá trị image_url vào model
    //     $product->image_url = $file_name;
    // }

    // // Điền các giá trị vào model sử dụng fill()
    // $product->fill($request->only(['description', 'price', 'brand_id', 'origin_id', 'size']));

    // // Lưu model vào cơ sở dữ liệu
    // if ($product->save()) {
    //     return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
    // } else {
    //     // Xử lý trường hợp lưu thất bại
    // }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
