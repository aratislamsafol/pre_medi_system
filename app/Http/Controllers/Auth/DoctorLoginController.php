<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{
    public function index(){
        return view('Doctor.login');
    }
    public function doctorLogin(Request $request){

        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
        ]);

        if(Auth::guard('doctor')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('doctor.dash');
        }else{
            return redirect()->route('doctor.login');
        }
    }


}
