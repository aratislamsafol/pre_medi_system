<?php

namespace App\Http\Controllers\Super_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function index(){
        return view('Admin.dashboard');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('super_admin.login');
    }
}
