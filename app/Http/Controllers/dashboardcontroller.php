<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class dashboardcontroller extends Controller
{
    public function __invoke(){
        return view('layouts/dashboard',["title"=>"dashboard"]);
    }
}
