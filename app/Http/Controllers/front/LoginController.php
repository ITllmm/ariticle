<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function index()
    {
        return view('front/login');
    }

    public function login(Request $request)
    {
        //验证
        $this->validate($request, [
            'email' => 'required | min:2 | email',
            'password' => 'required | min:6 | max:30',
            'is_remember' => 'integer'
            ]);

        //逻辑
        $is_remember = boolval($request['is_remember']);
        if( \Auth::attempt(['email' => $request['email'], 'password' => $request['password'] ],$is_remember)){
            // 渲染
            return redirect('front/post');
        } else {
            return \Redirect::back()->withErrors('password error');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return  view('front.login');//redirect('front/login');
    }
}
