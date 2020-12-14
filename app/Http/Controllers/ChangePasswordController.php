<?php

namespace App\Http\Controllers;

use App\Events\ChangePasswordEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function getChangePassword()
    {
        return view('changePassword');
    }

    public function postChangePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Specify the email',
            'email.email' => 'Specify a valid email address',
            'password.required' => 'Specify the password'
        ]);

        $email = $request->get('email');
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->get('password'));

        \Event::dispatch(new ChangePasswordEvent($user));

        $user->save();

        return response()->json($user);
    }

}


