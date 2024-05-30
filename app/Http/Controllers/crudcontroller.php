<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use app\Http\Requests\RegisterRequest;
class crudcontroller extends Controller
{   
    public function showUsers(){
    }
    public function create(RegisterRequest $request){
        $user = user::create($request->validated());
    }
    public function update(Request $request){
        $user = new User();
        $user->names= $request->names;
        $user->lastnames= $request->lastnames;
        $user->email= $request->email;
        $user->phone_number= $request->phone_number;
        $user->password= $request->password;
    }
    public function delete(Request $request){
    }
}
