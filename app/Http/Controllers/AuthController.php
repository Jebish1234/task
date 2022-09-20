<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;

class AuthController extends Controller
{
    public function register(Request $request){

        $request->validate(
            [
                'name' => ['required','string'],
                'email' => ['required','string', 'email', 'unique:users'],
                'phone' => ['required','digits:10'],
                'state' => ['required','string'],
                'address' =>['required','string'],

            ]
            );

            

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        
        
        $otp=random_int(100000, 999999);
        $user->otp = $otp;

        if($user->save()){
            $details = [
                'title' => 'Mail from task to register',
                'body' => 'this is your OTP : '  .$otp , 
            ];

            Mail::to($request->email)->send(new OtpMail($details));
            return redirect('loginpage');
        }

    }


    public function login(Request $request){
        $request->validate(
            [
                'email' => ['required','string', 'email'],
                'phone' => ['required','digits:10'],
                'otp' =>['required','string'],

            ]
            );

        $email = $request->input('email');
        $phone = $request->input('phone');
        $enotp = $request->input('otp');
        $otp = User::where(['email'=>$email,'phone'=>$phone])->first();
        if($otp){

            if($enotp == $otp->otp){
                // if (Auth::attempt(['phone'=>$phone,'email'=>$email,'otp'=>$enotp,'password'=>null])){
                    $user = User::where(['phone'=>$phone,'email'=>$email,'otp'=>$enotp])->first();
                    Auth::login($user);
                    return redirect('home');
    
                // }
                // else{
                //     return back()->withErrors(['Invalid Credentials']);
                // }
       
            }
    
            else{
                return back()->withErrors(['Invalid OTP or credentials']);
    
            }
        }

        else{
            return back()->withErrors(['Invalid Credentials']);
            }
        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('loginpage');
    }

}
