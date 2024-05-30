<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
class logincontroller extends Controller
{
    public function login(){
        $credentials = request()->only('email','password');
        if(!Auth::attempt($credentials)){
            $message="datos incorrectos";
            return redirect("/")->with('error', 'Informacion de inicio de sesion erronea');;
        }
        request()->session()->regenerate();
        return redirect('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('dashboard');
    }
}
