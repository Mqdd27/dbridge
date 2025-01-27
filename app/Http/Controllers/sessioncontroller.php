<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class sessioncontroller extends Controller
{
    function index()
    {

        return view('login');
    }
    function login(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'Please enter your name',
                'password.required' => 'Please enter your password',
            ]
        );
        $infologin = [
            'name' => $request->name,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            // return (redirect('dashboard'));

            if (Auth::user()->role == 'user') {
                return redirect('dashboard/user');
            } elseif (Auth::user()->role == 'supplier') {
                return redirect('dashboard/supplier');
            } elseif (Auth::user()->role == 'sm') {
                return redirect('dashboard/admin');
            }
        } else {
            return redirect('')->withErrors('Email atau Password salah')->withInput();
        }
    }
}
