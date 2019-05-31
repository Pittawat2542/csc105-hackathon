<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Exception;

class FacebookController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToFacebook()

    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleFacebookCallback(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }
        $socialUser = Socialite::driver('facebook')->stateless()->user();
        $user = User::where('facebook_id', $socialUser->getID())->first();

        if(!$user)
            User::create ([
                'facebook_id'   => $socialUser->getID(),
                'name'      => $socialUser->getName(),
                'email'         => $socialUser->getEmail(),
                'password' => bcrypt('facebookpass33'),
            ]);

        auth()->login($user);
        return redirect ('/');
    }
}
