<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required' 
        ]);
        // login using auth
        // if(Auth::attempt($attributes))
        // {
        //     session()->regenerate();
        //     return redirect('student')->with(['success'=>'You are logged in.']);
        // }
        // else{
        //     // return back()->withErrors(['username'=>'Username or password invalid.']); // specifically show error according to field
        //     return back()->with(['error'=>'Username or password invalid.']);
        // }


        // login using without auth
        $check = Login::where('username', $attributes['username'])->first();
        if ($check) {
            if (Hash::check($attributes['password'], $check->password)) {
                session(['adminid' => $check->id, 'username' => $check->username]);
                return redirect('student')->with(['success'=>'You are logged in.']);
            }
            else {
                return back()->with(['error'=>'Invalid credentials.']);    
            }
        }
        else {
            return back()->with(['error'=>'User not found.']);
        }
    }
    public function logout()
    {
        // Auth::logout();
        session()->forget('adminid');
        session()->forget('username');

        return redirect('/')->with(['success'=>'You\'ve been logged out.']);
    }
}
