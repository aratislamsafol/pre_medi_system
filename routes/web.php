<?php

use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\Auth\SuperAdminLoginController;
use App\Http\Controllers\DistricController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Super_Admin\SuperAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ============================= Division ======================================
Route::get('division_datatable', [DivisionController::class,'index']);
Route::post('store-division', [DivisionController::class,'store']);
Route::post('edit-division', [DivisionController::class,'edit']);
Route::post('delete-division', [DivisionController::class,'destroy']);
Route::get('view-division',  [DivisionController::class,'view']);

// ============================= Distric ======================================
Route::get('district_datatable', [DistricController::class,'index']);
Route::post('store-distric', [DistricController::class,'store']);
Route::post('edit-distric', [DistricController::class,'edit']);
Route::post('delete-district', [DistricController::class,'destroy']);
Route::get('view-distric', [DistricController::class,'view']);

// API routes
Route::get('get-districts/{id}', function($id){
    return json_encode(App\Models\District::where('division_id', $id)->get());
});

// ============================= Doctor ======================================

Route::get('doctor/login/form',[DoctorLoginController::class,'index'])->name('doctor.login');
Route::post('/doctor/login',[DoctorLoginController::class,'doctorLogin'])->name('doctor.data.save');
Route::group(['middleware'=>'doctor'],function(){
    Route::get('/doctor/dashboard',[DoctorController::class,'index'])->name('doctor.dash');
});

// ============================= SuperAdmin ======================================
Route::get('/super_admin/login/form',[SuperAdminLoginController::class,'index'])->name('super_admin.login');
Route::post('/super_admin/login',[SuperAdminLoginController::class,'superAdminLogin'])->name('super_admin.data.check');
Route::group(['middleware'=>'super_admin'],function(){
    Route::get('/super_admin/dashboard',[SuperAdminController::class,'index'])->name('super_admin.dash');
});
Route::get('logout',[SuperAdminController::class,'logout']);
