<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_index;
use App\Http\Controllers\C_detail;

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

Route::get('/',[C_index::class,'index']);
Route::get('/ttr_reactive',[C_detail::class,'detail_ttr_reactive']);
Route::get('/ttr_comp',[C_detail::class,'detail_ttr_comp']);
Route::get('/cnop_mmrr',[C_detail::class,'detail_cnop_mmrr']);

Route::get('/cnop_minor',[C_detail::class,'detail_cnop_minor']);
Route::get('/cnop_major',[C_detail::class,'detail_cnop_major']);
Route::get('/cnop_critical',[C_detail::class,'detail_cnop_critical']);

Route::get('/cnop_sukses',[C_detail::class,'detail_cnop_sukses']);
Route::get('/wib_olo',[C_detail::class,'detail_wib_olo']);




Route::post('/kirim',[C_userTest::class,'kirim']);

Route::get('/datauser',[C_userTest::class,'dataUser']);
