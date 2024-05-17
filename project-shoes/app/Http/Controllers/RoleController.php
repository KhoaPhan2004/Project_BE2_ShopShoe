<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $data = Role::paginate(15);
        return view('admin.role.index',compact('data'));
    }

    public function update(Request $request,Role $role){
        $request->validate([
            'name'=>'required'
        ],['name.required'=>'tên nhóm quyền không để trông']);
        //array_push($request->route,'admin.admin.index');
        $routes = json_encode($request->route);
        $role->update(['name'=>$request->name,'permissions'=>$routes]);
        return redirect()->route('admin.role.index')->with('success','thêm nhóm quyền thành công');
    }

    public function edit($id){
        $model = Role::find($id);
        $permissions = json_decode($model->permissions);
       
        $routes = [];

        $all = Route::getRoutes();
        foreach($all as $r){
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if ($pos !== false && !in_array($name,$routes)) {
                array_push($routes,$name);
            }
           
        }
        //dd($routes);
        return view('admin.role.edit',compact('routes','model','permissions'));
    }

    public function create(){
        $routes = [];
        $all = Route::getRoutes();
        foreach($all as $r){
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if ($pos !== false && !in_array($name,$routes)) {
                array_push($routes,$name);
            }
           
        }
        //dd($routes);
        return view('admin.role.create',compact('routes'));
    }
    
    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ],['name.required'=>'tên nhóm quyền không để trông']);
        //array_push($request->route,'admin.admin.index');
        $routes = json_encode($request->route);
        
        Role::create(['name'=>$request->name,'permissions'=>$routes]);
        return redirect()->route('admin.role.index')->with('success','thêm nhóm quyền thành công');
    }

}
