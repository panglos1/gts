<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	public function __construct()
	{
    	if($this->guard()->check()) {
    		return redirect('/dashboard');
    	}
	}

    public function index(Request $request)
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $errors = new MessageBag();

		$validated = $request->validated();

		if( $validated ) {
	    	if($this->guard()->attempt($validated, true)) {
	    		$request->session()->regenerate();
	    		return redirect('dashboard');
	    	} else {
	    		$errors->add('project_create_failed', 'Une erreur s\'est produite');
	    	}
		}

        return view('login')->withErrors($errors);;
    }

    public function guard()
    {
    	return Auth::guard("web");
    }
}
