<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\CulinaryController;
use App\Http\Controllers\CraftController;
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

//Master Culture
Route::get('/culture',[CultureController::class, 'index']);
Route::get('/culture/create_culture',[CultureController::class, 'create_culture']);
Route::get('/culture/update_culture/{id}',[CultureController::class, 'update_culture']);
Route::post('/culture/create',[CultureController::class, 'create']);
Route::post('/culture/update',[CultureController::class, 'update']);
Route::post('/culture/delete/{id}',[CultureController::class, 'delete']);
//Master Culture

// Master Culinary
Route::get('/culinary',[CulinaryController::class, 'index']);
Route::get('/culinary/create_culinary',[CulinaryController::class, 'create_culinary']);
Route::get('/culinary/update_culinary/{id}',[CulinaryController::class, 'update_culinary']);
Route::post('/culinary/create',[CulinaryController::class, 'create']);
Route::post('/culinary/update',[CulinaryController::class, 'update']);
Route::post('/culinary/delete/{id}',[CulinaryController::class, 'delete']);
// Master Culinary

// Master Craft
Route::get('/craft',[CraftController::class, 'index']);
Route::get('/craft/create_craft',[CraftController::class, 'create_craft']);
Route::get('/craft/update_craft/{id}',[CraftController::class, 'update_craft']);
Route::post('/craft/create',[CraftController::class, 'create']);
Route::post('/craft/update',[CraftController::class, 'update']);
Route::post('/craft/delete/{id}',[CraftController::class, 'delete']);
// Master Craft