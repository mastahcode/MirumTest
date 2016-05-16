<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\User;
use Auth;
use DB;
use Exception;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;
use Redirect;


class FacebookLoginController extends Controller
{

    public function create(){
        return view('frontend.Registrasi.registerSosialMedia');
    }

    public function store(){
        return 'disimpan';
    }
    public function getFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function getDataFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            //dd(User::where('email', $user->email)->first());
        } catch (Exception $e) {
            return Redirect::to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);
        $cekEmail = User::where('email', $user->email)->first();
        //$cekUsername = User::where('username',$user->user['login'])->first();
        if (!empty($cekEmail)) {
            Auth::login($cekEmail, true);
            return redirect(url(action('BlogFrontController@index')));

        }

        else {
            return view('frontend.Registrasi.registerForm', compact('user'));
        }
        /*Auth::login($authUser, true);
        return Redirect::to('home');*/

    }

    public function registerFb(){
        $regis = new User();
        $regis->username = Input::get('username');
        $regis->email = Input::get('email');
        $regis->nama = Input::get('nama');
        $regis->password = bcrypt(Input::get('password'));
        $regis->role_id = DB::table('roles')->select('id')->where('slug','user')->first()->id;

        if($regis->save()){
            flash()->success('Selamat registrasi berhasil, silahkan melakukan Login');
            return redirect(url(action('LoginController@index')));
        }
        flash()->error('registrasi gagal');
        return redirect(url(action('LoginController@index')));
    }

    private function findOrCreateUser($githubUser)
    {
        $authUser = User::where('email', $githubUser->email)->first();
        if ($authUser) {
            return $authUser;
        }

        return redirect(url(action('FacebookLoginController@create')));
    }


}
