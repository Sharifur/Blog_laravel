<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
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
