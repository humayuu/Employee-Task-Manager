<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * For login page
     */
    public function loginPage()
    {
        return view('login');
    }


    /**
     * For redirect to dashboard 
     */
    public function Dashboard()
    {
        return view('dashboard');
    }
    /**
     * For User Login
     */
    public function userLogin(UserAuthRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }
    }


    /**
     * For User Logout
     */
    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }
}
