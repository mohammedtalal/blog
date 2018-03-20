<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class registrationController extends Controller
{

    public function __construct () {
        $this->middleware('guest');
    }


    public function create() {
    	return view('registration.create');
    }

    public function store(RegistrationFormRequest $form) {
        
        $form->persistRegisterForm();
        session()->flash('success','Thanks so much for signing up');
    	return redirect()->home();
    }
}
