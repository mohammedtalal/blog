<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{	

	public function __construct() {
		$this->middleware('guest',['except' => 'destroy']);
	}

	// To logIn using email and password
    public function create() {
    	return view('sessions.create');
    }

    public function store () {

    	// attempt to authenticate user
    	if(! auth()->attempt(request(['email','password'])) ) {
    		// If not redirect back 
            // dd(request()->all());
    		return back()->withErrors([
    			'message'	=>	'Please check your credentials and try again'
    		]);
    	}
    	// if yes, redirect to home
    	return redirect()->route('home');

    }

    public function destroy() {
    	auth()->logout();
    	return redirect()->home();
    }

    
}
