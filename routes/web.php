<?php

use App\Http\Controllers\CheckOngkir;
use Illuminate\Support\Facades\Route;

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

Route::get('/ongkir',[CheckOngkir::class, 'index']);
Route::post('/ongkir',[CheckOngkir::class, 'check_ongkir']);
Route::get('/cities/{province_id}', [CheckOngkir::class, 'getCities']);
