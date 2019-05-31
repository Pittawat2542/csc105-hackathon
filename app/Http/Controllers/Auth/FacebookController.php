<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();

            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            Auth::loginUsingId($createdUser->id);

            return redirect()->route('home');

        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
