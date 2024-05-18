<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Origin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            return redirect()->route('admin.product.index')->with('success', 'Thêm mới thành công');
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
    public function show($id)
    {
        $product = Product::with('comments')->findOrFail($id);
        return view('details', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404); 
        }

        $brands = Brand::orderBy('brand_name', 'DESC')->select('id', 'brand_name')->get();
        $origins = Origin::orderBy('origin_name', 'DESC')->select('id', 'origin_name')->get();

        return view('admin.product.edit', compact('product', 'brands', 'origins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404); 
        }

        // Xử lý các dữ liệu được gửi từ form
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('brand_id');
        $product->origin_id = $request->input('origin_id');
        $product->size = $request->input('size');

        // xử lí hình ảnh
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $ext = $file->getClientOriginalExtension(); // lấy đuôi của file

            // Tạo tên file mới để lưu trữ
            $file_name = time() . '-' . Str::slug($product->product_name) . '.' . $ext;
            //vào images
            $file->move(public_path('images'), $file_name);

            // update đừng dẫn
            $product->image_url = $file_name;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
    public function sort($order)
    {
        if ($order == 'desc') {
            $products = Product::select('products.*', 'brands.brand_name as brand_name', 'origins.origin_name as origin_name')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->join('origins', 'origins.id', '=', 'products.origin_id')
                ->orderBy('products.price', 'DESC')
                ->paginate(3);
        } elseif ($order == 'asc') {
            $products = Product::select('products.*', 'brands.brand_name as brand_name', 'origins.origin_name as origin_name')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->join('origins', 'origins.id', '=', 'products.origin_id')
                ->orderBy('products.price', 'ASC')
                ->paginate(3);
        } else {
            // lỗi
        }

        return view('admin.product.index', compact('products'));
    }
}
