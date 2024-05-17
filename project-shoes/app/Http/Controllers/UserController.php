<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::paginate(15);
        return view('admin.user.index',compact('data'));
    }
    public function show(){

    }
    public function update(Request $request,User $user){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'address' => 'required',
            'password'=> 'required|min:6',
            
        ];
        
        $request->validate($rules);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ];
        $user->update($data);
        if (is_array($request->role)) {
            UserRole::where('user_id',$user->id)->delete();
            foreach($request->role as $role_id)
            {
                UserRole::create(['user_id'=>$user->id,'role_id'=>$role_id]);
            }
        }
        return redirect()->route('admin.user.index');
    }
    public function edit(User $user){
        $role_assignments = $user->getRoles->pluck('name','id')->toArray();
        
        $roles = Role::orderBy('name','ASC')->get();
        return view('admin.user.edit',compact('user','roles','role_assignments'));
    }
    public function login()
    {
        return view('login');
    }
    public function check_login(Request $request)
    {
        // request()->validate([
        //     'email' => 'required|email|exists:users',
        //     'password' => 'required',

        // ]);
        // $data = request()->only('email', 'password');
        // if (auth('web')->attempt($data)) {
        //     return redirect()->route('home.index');
        // }
        // else{
        //     return redirect()->back()->withInput()->withErrors(['sai thong tin']);
        // }
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home.index');
               
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function create(){
       
        return view('admin.user.create');
    }
    public function store(Request $request){
        request()->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
        ]);
        //kiểm tra tên tồn tại hay ko
        $existingUser = User::where('name', $request->name)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.']);
        }

        

        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            
        ]);
        
        return redirect()->route('admin.user.index');
    }
    public function register()
    {
        return view('register');
    }
    public function check_register(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'image_url' => 'required|nullable|image',
        ]);
        //kiểm tra tên tồn tại hay ko
        $existingUser = User::where('name', $request->name)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.']);
        }

        $imageContent = file_get_contents($request->file('image_url')->path());

        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'image_url' => $imageContent,
        ]);

        return redirect()->route('login');
    }
}
