<?php
use App\http\controllers\dashboardcontroller;
use App\http\controllers\logincontroller;
use App\Http\Controllers\recoverpass;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home',["title"=>"Home", "message"=>" "]);
})->name("home")->middleware('guest');
Route::post('login', [logincontroller::class,'login']);
Route::post('logout', [logincontroller::class,'logout']);
Route::get('recuperar', function(){
    return view ('recover',['title'=>'Recuperar contraseña']);
});
Route::post('recuperar', [recoverpass::class,'recover']);
Route::get('/dashboard', dashboardcontroller::class)->middleware("auth");
Route::post('/dashboard/create', function () {
    return view('layouts/dashboard',["title"=>"dashboard"]);
});
