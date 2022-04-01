<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SuperAdminRegistrationController extends Controller
{
    public function index(){
        return view('Admin.auth.registration');
    }

    public function store(Request $request){

        $admin_image=$request->file('sadmin_image');
        $name_gen=hexdec(uniqid()).'.'.$admin_image->getClientOriginalExtension();
        Image::make($admin_image)->resize(300,300)->save(public_path('img/super_admin/'.$name_gen));

        $img_add_all='img/super_admin/'.$name_gen;

        $admin_data=new SuperAdmin();
        $admin_data->f_name=$request->f_name;
        $admin_data->l_name=$request->l_name;
        $admin_data->user_name=$request->l_name.rand(1, 3000);
        $admin_data->age=$request->age;
        $admin_data->ip_address=request()->ip();
        $admin_data->phone=$request->phone;
        $admin_data->street_address=$request->street_address;
        $admin_data->division_id=$request->division_id;
        $admin_data->district_id=$request->distric_id;
        $admin_data->blood_group=$request->blood_group;
        $admin_data->email=$request->email;
        $admin_data->password=Hash::make($request->password);
        $admin_data->remember_token= Str::random(40);
        $admin_data->sadmin_image=$img_add_all;

        $admin_data->save();

        return Redirect()->route('super_admin.login');
    }
}
