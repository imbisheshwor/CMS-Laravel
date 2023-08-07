<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





    public function login(Request $request)
    {

        $input = $request->all();
        $this->validate(
            $request,
            [
                'email' => 'required | email',
                'password' => 'required',
            ]
        );
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                // return redirect()->route('dashboard');
                echo "Admin";
            } else {
                // return redirect()->route('home');
                echo "user";
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }







    function sign_in()
    {

        return view('frontend.sign-in');
        // return view('auth.login');
    }

    function sign_up()
    {

        return view('frontend.sign-up');
        // return view('auth.register');
    }
}
