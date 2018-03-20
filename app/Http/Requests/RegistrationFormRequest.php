<?php

namespace App\Http\Requests;


use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required|confirmed',
            'avatar'    => 'required|image',
            'bio'       => 'required'
        ];
    }

    public function uploadAvatar() {
        $avatar     = request()->file('avatar');
        $avatarName = str_random(50).$avatar->getClientOriginalName();
        $avatar->move('images/avatars/',$avatarName);   
        return $avatarName;
    }

    public function persistRegisterForm() {
        $user = new User;

        $user->name  = request('name');
        $user->email = request('email');
        // $user->bio = request('bio');
        $user->password = Hash::make(request('password'));
        $user->avatar= $this->uploadAvatar();
        $user->save();
        // dd($user);
        auth()->login($user);

        // \Mail::to($user)->send(new Welcome($user));
       
    }
}
