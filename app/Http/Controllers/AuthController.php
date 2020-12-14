<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Redirect;
use Session;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Specify the email',
            'email.email' => 'Specify a valid email address',
            'password.required' => 'Specify the password'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');

        if (Auth::attempt(['email' => $email,'password' => $password])) {
            return response()->json('Login Successfully');
        }

        return response()->json('Login Fail!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect::back();
    }
}
