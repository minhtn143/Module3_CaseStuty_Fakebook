<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        try {
            $providerUser = Socialite::driver($provider)->user();
            $existUser = User::where('email', $providerUser->email)->first();
            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->provider_name = $provider;
                $user->provider_id = $providerUser->id;
                $user->first_name = $providerUser->user['given_name'];
                $user->last_name = $providerUser->user['family_name'];
                $user->email = $providerUser->email;
                $user->avatar = $providerUser->avatar;
                $user->email_verified_at = now();
                // dd($providerUser);
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}