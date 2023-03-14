<?php

namespace App\Http\Controllers\RegisterControllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class RegistrationController
{
   function index(){
       return view('auth.login');
   }
   function registration(){
        return view('auth.register');
   }
   function validate_registration(Request $request){

       $request->validate([
           'name' => 'required|min:2',
           'telephone' => 'required|min:9',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:8',
           'password-confirmation' => 'required|same:password'
       ]);
       $data = $request->all();
       User::create([
           'name' => $data['name'],
           'phone_number' => $data['telephone'],
           'email' => $data['email'],
           'password' => Hash::make('password'),
           'role' => 1
       ]);
       return redirect('login')->with('success', 'registration complete!');
   }

    function logout(){

    }

}
