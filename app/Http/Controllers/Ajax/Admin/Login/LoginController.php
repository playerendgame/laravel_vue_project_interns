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

            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|confirmed',
            'password_confirmation' =>'required|same:password'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $result = ($user) ? 'Data has been created successfully' : 'There has an error creating a post';    
        return response()->json(['message' => $result]);
    }

        public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            return response()->json([
                'message' => 'Login successful',
                'redirect' => route('dashboard')
            ]);
        }

        return response()->json([
            'message' => 'The provided email or password is incorrect'
        ], 422); 
    }
        
        public function logout(Request $request){
            
            Auth::guard('user')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json(['message' => 'Logged out successfully']);
        }
}