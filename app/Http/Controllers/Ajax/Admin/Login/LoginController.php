<?php

namespace App\Http\Controllers\Ajax\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request){

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' =>'required|same:password'
        ]);

        if($user = new User()){
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login.login');
    }
        else {

        return response()->json(['message' =>'Error Retrieving Data'], 422);
    }
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if($user){
            if(Hash::check($request->input('password'), $user->password)){
                Auth::guard('user')->login($user);
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->withErrors(['email' => 'Invalid Email or Password']);
            }
        }else {
            return redirect()->back()->withErrors(['email' => 'Invalid Email or Password']);
        }

    }
}

