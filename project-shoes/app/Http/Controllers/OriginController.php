<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $origins = Origin::orderBy('id', 'DESC')->paginate(3);
        // Kiểm tra số lượng thương hiệu
        $brandCount = Origin::count();

        if ($brandCount > 0) {
            $perpage = 3;
            $origins = Origin::paginate($perpage);
            return view('admin.origin.index', ['origins' => $origins]);
        }
        return view('admin.origin.index', compact('origins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.origin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin_name' => 'required|unique:origins'
        ]);


        $data = $request->all('origin_name');
        Origin::create($data);


        return redirect()->route('admin.origin.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Origin $origin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Origin $origin)
    {
        //sua lại edit để edit đc ngày tạo
        // $origin->formatted_created_at = $origin->created_at->format('d/m/Y H:i:s');
        return view('admin.origin.edit', compact('origin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Origin $origin)
    {
        $request->validate([
            'origin_name' => 'required|unique:origins,origin_name,' . $origin->id,
        ]);


        $data = $request->all('origin_name', 'created_at');
        $origin->update($data);


        return redirect()->route('admin.origin.index')->with('success', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin $origin)
    {
        $origin->delete();
        return redirect()->route('admin.origin.index')->with('success', 'Xóa thành công');
    }
}
