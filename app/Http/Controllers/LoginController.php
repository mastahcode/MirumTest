<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest',['only'=>['index']]);
        $this->middleware('auth',['only'=>['getLogout']]);
    }

    public function index(){
        return view('frontend.LoginRegister.Login');
    }

    public function postLogin(LoginRequest $request){
        if(Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])){
            flash()->success('sukses login');
            return redirect(url(action('BlogFrontController@index')));
        }elseif(Auth::attempt([
            'email' => $request->username,
            'password' => $request->password,
        ])){
            flash()->success('sukses login');
            return redirect(url(action('BlogFrontController@index')));
        }else{
            flash()->error('Gagal Login, cek kembali akun anda lagi');
            return redirect(url(action('LoginController@index')));
        }

    }

    public function getLogout(){
        Auth::logout();
        return redirect(url(action('BlogFrontController@index')));
    }
}
