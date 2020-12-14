<?php

namespace App\Http\Controllers;

use App\Events\ForgotPasswordEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function getForgotPassword()
    {
        return view('forgotPassword');
    }

    public function postForgotPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ],[
            'email.required' => 'Specify the email',
            'email.email' => 'Specify a valid email address',
        ]);

        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        $hashed_random_password = Hash::make(str_random(8));
        $user->password = $hashed_random_password;

        \Event::dispatch(new ForgotPasswordEvent($user));

        $user->save();

        return response()->json($user);
    }
}

