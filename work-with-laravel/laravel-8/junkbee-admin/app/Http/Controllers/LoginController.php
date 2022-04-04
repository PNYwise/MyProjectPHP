<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function authenticate(request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:255'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toast('login success!', 'success');

            if (auth()->user()->role == 'manager') {

                return redirect('dashboard/manager/home');
            } elseif (auth()->user()->role == 'customer rep') {

                return redirect('dashboard/customerrep/home');
            }
            return redirect('dashboard/home');
        }

        toast('wrong email or password!', 'error');
        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
