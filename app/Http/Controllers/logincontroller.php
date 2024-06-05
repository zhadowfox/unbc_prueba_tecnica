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
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return redirect("/")->with('error', 'Informacion de inicio de sesion erronea, El correo electrónico no existe.');
        }
        if ($user->active==0) {
            return redirect("/")->with('error', 'El usuario se encuentra deshabilitado, solicita a un administrador de la plataforma que seas activado de nuevo.');
        }
        if(!Auth::attempt($credentials)){
            return redirect("/")->with('error', 'Informacion de inicio de sesion erronea, la contraseña es incorrecta.');
        }
        request()->session()->regenerate();
        return redirect('dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('dashboard');
    }
}
