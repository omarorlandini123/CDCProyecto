<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UsuarioController extends Controller
{
    public function getUserData(){
        if(Auth::check()){
            return User::where('id',Auth::user()->id)->with('persona')->first();
        }else{
            return new User;
        }
    }
}
