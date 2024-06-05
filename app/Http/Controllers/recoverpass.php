<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
class recoverpass extends Controller
{
    public function recover(){
        $credentials = request()->only('email');
        $emailExists = User::where('email', $credentials)->exists();
        //logica de crear un token para generar una url unica con dicho token para el cambio de contrasena
        if ($emailExists) {
            return redirect("/")->with('error', 'Se ha enviado un correo con los pasos a: '. $credentials['email']);
        } else {
            return redirect("/recuperar")->with('error', 'El correo no existe en nuestro sistema, asegurate de revisar el correo que ingresaste o de que estes usando un correo valido');
        }
    }
}
