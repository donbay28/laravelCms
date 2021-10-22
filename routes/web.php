<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\WisataController;
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
//Dashboard
Route::get('/dashboard', function(){
    return view('dashboard');
});
//Dashboard

//Login And Logout
Route::get('/',[AuthController::class, 'index']);
Route::post('/auth/login',[AuthController::class, 'login']);
Route::get('/auth/logout',[AuthController::class, 'logout']);
//Login And Logout

//Master Kota
Route::get('/kota',[KotaController::class, 'index']);
Route::get('/kota/create_kota',[KotaController::class, 'create_kota']);
Route::get('/kota/update_kota/{id}',[KotaController::class, 'update_kota']);
Route::post('/kota/create',[KotaController::class, 'create']);
Route::post('/kota/update',[KotaController::class, 'update']);
Route::post('/kota/delete/{id}',[KotaController::class, 'delete']);
//Master Kota

//Master Wisata
Route::get('/wisata',[WisataController::class, 'index']);
Route::get('/wisata/create_wisata',[WisataController::class, 'create_wisata']);
Route::get('/wisata/update_wisata/{id}',[WisataController::class, 'update_wisata']);
Route::post('/wisata/create',[WisataController::class, 'create']);
Route::post('/wisata/update',[WisataController::class, 'update']);
Route::post('/wisata/delete/{id}',[WisataController::class, 'delete']);
//Master Wisata