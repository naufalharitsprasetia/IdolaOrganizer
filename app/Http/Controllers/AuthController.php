<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login', [
            'active' => 'login',
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        // // $credentials = $request->only('email', 'password');
        // $user = User::where('email', $request->input('email'))->first();

        // if ($user) {
        //     if (Hash::check($request->input('password'), $user->password)) {
        //         Auth::login($user);
        //         $request->session()->regenerate();
        //         return redirect('/')->with('success', 'Selamat ! anda berhasil Masuk');
        //     } else {
        //         return redirect()->back()->with('loginError', 'Login gagal!');
        //     }
        // } else {
        //     return redirect()->back()->with('loginError', 'Login gagal!');
        // }
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Selamat ! anda berhasil Masuk');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function addUser(Request $request)
    {
        // dd($request->all());

        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'user_password' => 'required|min:6|confirmed',
        ];

        $request->validate($rules);

        $user = new User();
        $user->user_id = Str::uuid();
        $user->user_nama = $request->user_name;
        $user->user_username = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_password = Hash::make($request->user_password);
        $user->user_role = 'user';
        $user->save();

        if ($user) {
            return redirect()->route('home.sign-in')->with('success', 'Akun berhasil dibuat');
        } else {
            return redirect()->back()->with('error', 'Oooops... ada yang salah nih');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
