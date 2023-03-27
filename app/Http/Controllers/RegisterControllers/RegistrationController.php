<?php

namespace App\Http\Controllers\RegisterControllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
           'password' =>Hash::make($data['password']),
           'role' => 1
       ]);
       $email=$data['email'];
       $name=$data['name'];
       Mail::send('mails.register_mail',  $data, function($message) use ($email,$name){
           $message
               ->from(config('mail.from.address'), config('mail.from.name'))
               ->to($email, $name)
               ->subject('Account has been created');
       });
       return redirect('login')->with('success', 'registration complete!');
   }
    function validate_login(Request $request)
    {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);


        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)){
            return redirect()->to('login')
                ->with(trans('warning','Not valid credentials'));
        }
//        if(Auth::attempt($credentials))
//        {
//            dd($credentials);
//
//        }
        $user=Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        return redirect('dashboard');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }

}
