<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        return view('frontend.Registrasi.registerForm');
    }

    public function store(RegisterRequest $request){

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
}
