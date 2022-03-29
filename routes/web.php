<?php

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
