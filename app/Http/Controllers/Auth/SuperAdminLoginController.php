<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminLoginController extends Controller
{
    public function index(){
        return view('Admin.login');
    }

    public function superAdminLogin(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
        ]);
        if(Auth::guard('super_admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('super_admin.dash');
        }else{
            return redirect()->route('super_admin.login');
        }
    }
}
