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
        $origins=Origin::orderBy('id','DESC')->paginate(50);
        return view('admin.origin.index',compact('origins'));
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


        return redirect()->route('origin.index');
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
        return view('admin.origin.edit',compact('origin'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Origin $origin)
    {
        $request->validate([
            'origin_name' => 'required|unique:origins,origin_name,'.$origin->id
        ]);

        
        $data = $request->all('origin_name');
        $origin->update($data);


        return redirect()->route('origin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin $origin)
    {
        $origin->delete();
        return redirect()->route('origin.index');

    }
}
