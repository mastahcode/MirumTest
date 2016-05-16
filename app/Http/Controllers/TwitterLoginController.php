<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Redirect;
use Socialite;

class TwitterLoginController extends Controller
{
    public function getTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function getDataTwitter()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            //dd($user->nickname);
        } catch (Exception $e) {
            return Redirect::to('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);
        $cekUsername = User::where('username', $user->nickname)->first();
        //$cekUsername = User::where('username',$user->user['login'])->first();
        if (!empty($cekUsername)) {
            Auth::login($cekUsername, true);
            return redirect(url(action('BlogFrontController@index')));
        }
        else {
            return redirect(url(action('SosmedController@create')));
        }

    }

    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('email', $twitterUser->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return redirect(url(action('SosmedController@create')));
    }
}
