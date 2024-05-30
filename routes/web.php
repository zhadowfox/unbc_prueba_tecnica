<?php
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\logincontroller;
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
Route::get('/dashboard', dashboardcontroller::class)->middleware("auth");
Route::post('/dashboard/create', function () {
    return view('layouts/dashboard',["title"=>"dashboard"]);
});
