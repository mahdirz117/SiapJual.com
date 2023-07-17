<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:10',
            'password' => 'required|min:8|max:12'
        ]);

        //saat submit, data dimasukkan kedalam array untuk ditata
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];


        //didalam if, terdapat ‘Auth::Attempt($data)’ yang berfungsi    melakukan autentikasi
        if (Auth::Attempt($data)) {
            Session::put('email', $data['email']);
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Succesfull! Please Login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
