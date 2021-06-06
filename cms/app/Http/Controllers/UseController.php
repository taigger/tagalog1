<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //この行を上に追加
use App\User;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//

class UsersController extends Controller
{
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
    
    public function index()
    {

         // 全ての投稿を取得
        $users = User::get();
        return view('users/index',[
            'users'=> $users
            ]);
    
    }
}