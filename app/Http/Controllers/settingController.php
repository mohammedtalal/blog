<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class settingController extends Controller
{
    
	public function index($id) {
		$user = User::find($id);
		return view('profile.settings',compact('user'));
	}

	public function update(RegistrationFormRequest $form,$id) {
		$user = User::find($id);
		$user->update(request()->all());

		if (request()->hasFile('avatar')) {
	        $user->avatar= $form->uploadAvatar();
	        $user->password = Hash::make(request('password'));
	        $user->save();
		}
		return redirect('/')->with('success','Your information updated successfully');
	}

}
