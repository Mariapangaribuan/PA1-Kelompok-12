<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Redirect;

class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect(); 
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = Contributor::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::guard('contributor')->login($finduser);
                return redirect()->intended('contributor/dashboard');
            } else {
                $newUser = Contributor::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::guard('contributor')->login($newUser);
                return redirect()->intended('contributor/dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

