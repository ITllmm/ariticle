<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){

        $user = \App\User::find(\Auth::id());
        $posts =  $user->Posts;
        return view('front.post.index',compact('posts'));

    }
}
