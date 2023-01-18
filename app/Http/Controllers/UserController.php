<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function register(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('users.register');
    }

    public function login(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('users.login');
    }

    public function registerUser(Request $request){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        Auth::login(User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>bcrypt($request->password),
            'role'=>"customer",
        ]));

        return redirect('/');
    }

    public function actionLogin(Request $request){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = false;
        if($request->has("remember_me"))
        {
            if($request->remember_me=='on')
            {
                $remember=true;
            }
        }
        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect('/');
        }
        else{
            return redirect('/login')->withErrors(["login_failed"=>"Credential is Invalid"]);
        }
    }

    public function viewProfile()
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('/menu/edit-profile');
    }

    public function updateProfile(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $request->validate([
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
        ]);
        $user = Auth::user();
        $user->name = $request->username;
        $user->email = $request->email;
        /** @var \App\Models\User $user **/
        $user->save();
        return view('/menu/home');
    }

    public function viewChangePassword()
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('/menu/change-password');
    }

    public function changePassword(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $request->validate([
            'old_password' => 'required|min:6' ,
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = Auth::user();
        if(Hash::check($request->old_password,$user->password))
        {
            $user->password = bcrypt($request->password);
            /** @var \App\Models\User $user **/
            $user->save();
            return view('/menu/home');
        }
        else{
            return redirect('/change-password')->withErrors(["error_change"=>"Old Password Does Not Match"]);
        }
    }

    public function logout(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        Auth::logout();
        return redirect('/');
    }
}
