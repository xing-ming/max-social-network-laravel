<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    // postIndex
    public function getIndex()
    {
        return view('welcome');
    }

    // postSignUp
    public function postSignUp(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        
        $user->save();
        Auth::login($user);
        return redirect()->route('users.dashboard');
    }

    // postsignin
    public function postSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]))
        {
            return redirect()->route('users.dashboard');
        }
        return redirect()->back();
    }

    // edit user account
    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }

    // update user account
    public function updateUserAccount(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100'
        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        return redirect()->route('users.dashboard');
    }
}
