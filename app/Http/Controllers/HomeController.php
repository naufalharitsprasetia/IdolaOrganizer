<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('index', [
            'active' => 'home',
            'title' => 'home'
        ]);
    }

    public function home()
    {
        return view('home.home', [
            'active' => 'home',
            'title' => 'home'
        ]);
    }

    public function contact()
    {
        return view('home.contact', [
            'active' => 'contact',
            'title' => 'contact'
        ]);
    }

    public function about()
    {
        return view('home.about', [
            'active' => 'about',
            'title' => 'about'
        ]);
    }
}
