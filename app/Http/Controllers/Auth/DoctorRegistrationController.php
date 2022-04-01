<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DoctorRegistrationController extends Controller
{
    public function index(){
        return view('Doctor.auth.registration');
    }

    public function store(Request $request){

        $doc_image=$request->file('doc_image');
        $name_gen=hexdec(uniqid()).'.'.$doc_image->getClientOriginalExtension();
        Image::make($doc_image)->resize(300,300)->save(public_path('img/doctor_profile/'.$name_gen));

        $img_add_all='img/doctor_profile/'.$name_gen;

        $doc_data=new Doctor();
        $doc_data->f_name=$request->f_name;
        $doc_data->l_name=$request->l_name;
        $doc_data->user_name=$request->l_name.rand(1, 3000);
        $doc_data->age=$request->age;
        $doc_data->ip_address=request()->ip();
        $doc_data->phone=$request->phone;
        $doc_data->status=1;
        $doc_data->street_address=$request->street_address;
        $doc_data->division_id=$request->division_id;
        $doc_data->district_id=$request->distric_id;
        $doc_data->blood_group=$request->blood_group;
        $doc_data->email=$request->email;

        $doc_data->password=Hash::make($request->password);
        $doc_data->remember_token= Str::random(40);
        $doc_data->doc_image=$img_add_all;
        $doc_data->specialist=$request->specialist;
        $doc_data->experience=$request->experience;
        $doc_data->Degree=$request->Degree;

        $doc_data->save();

        return Redirect()->route('doctor.login');
    }


}
