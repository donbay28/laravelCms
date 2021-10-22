<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
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