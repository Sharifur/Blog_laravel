<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        
        $socialuser = User::where('email',$user->email)->first();
        
        if($socialuser){
            Auth::login($socialuser);
            return redirect('/');
        } else {
            
            $alluser = new User;
            $alluser->name = $user->name;
            $alluser->email = $user->email;
            $alluser->password = 12345678;
            $alluser->save();
            
            Auth::login($alluser);
            return redirect('/');
        }
    }
}
