<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
       function sign_in(){

        return view('frontend.sign-in');
    }

    function sign_up(){

        return view('frontend.sign-up');
    }

}