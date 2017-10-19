<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('front/register');
    }

    public function register(Request $request)
    {
        //验证
        $this->validate($request,[
                'name' => 'required | min:3 | unique:users,name',
                'email' => 'required | email| unique:users,email',
                'password' => 'required | min:5 | confirmed'
            ]);

        //逻辑
        $password = bcrypt( $request['password']);
        $name = $request['name'];
        $email = $request['email'];
        $user =User::create(compact('name', 'email', 'password'));

        // 渲染
        return redirect('front.login');
    }
}
