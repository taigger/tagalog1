<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{
        
    public function index()
    {

         // 全ての投稿を取得
        $users = User::get();
        return view('users/index',[
            'users'=> $users
            ]);
    
    }
    //
}
