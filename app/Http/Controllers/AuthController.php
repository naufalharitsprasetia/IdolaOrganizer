<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login', [
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
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::alert('Berhasil', 'selamat ! anda berhasil masuk !', 'Success');
            return redirect('/')->with('success', 'Selamat ! anda berhasil Masuk');
        }
        return redirect()->back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {

        $title = 'Apakah Anda ingin Logout !';
        $text = "pastikan semua progress sudah tersimpan!";
        confirmDelete($title, $text);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register', [
            'active' => 'register',
            'title' => 'Register'
        ]);
    }

    public function addUser(Request $request)
    {
        // dd($request->all());

        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];

        $request->validate($rules);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            Alert::alert('Berhasil', 'Akun berhasil dibuat!', 'Success');
            return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
        } else {
            Alert::alert('Error', 'Oooops... ada yang salah nih', 'warning');
            return redirect()->back()->with('error', 'Oooops... ada yang salah nih');
        }
    }

    public function profile()
    {
        return view('auth.profile', [
            'active' => 'profile',
            'title' => 'profile'
        ]);
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('auth.edit-profile', [
            'active' => 'profile',
            'title' => 'profile',
            'user' => $user
        ]);
    }
    public function updateProfile(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required',
            'password' => 'nullable',
        ];
        $request->validate($rules);
        $user->update([
            'name' => $request->name,
            'gender' => $request->gender,
        ]);
        if ($request->password !== null) {
            $userPassword = Hash::make($request->password);
            $user->update([
                'password' => $userPassword,
            ]);
        }
        // dd($request);
        Alert::alert('Berhasil', 'Akun berhasil diperbaharui!', 'Success');
        return redirect()->route('profile')->with('success', 'Akun berhasil diperbaharui');
    }
}