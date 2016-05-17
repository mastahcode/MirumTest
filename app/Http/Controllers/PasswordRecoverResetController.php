<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\GantiPasswordRequest;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Mail;
use Redirect;
use URL;

class PasswordRecoverResetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['getGantiPassword', 'postGantiPassword']]);
        $this->middleware('guest', ['except' => ['getGantiPassword', 'postGantiPassword']]);
    }


    public function getPasswordReset()
    {
        return view('frontend.password.formPasswordReset');
    }

    public function postResetPassword()
    {

        $user = User::where('email', '=', Input::get('email'));

        if ($user->count()) {
            $user = $user->first();

            //generate new code n password
            $code = str_random(60);
            $password = str_random(10);

            $user->code = $code;
            $user->password_tmp = bcrypt($password);

            if ($user->save()) {

                Mail::send('frontend.password.resetPassword', array(
                    'link' => URL::action('PasswordRecoverResetController@getRecoverPassword', $code),
                    'username' => $user->username,
                    'password' => $password
                ), function ($message) use ($user) {
                    $message->to($user->email, $user->username)
                        ->subject('Reset Password baru');
                });
                flash()->success('Password baru telah d kirimkan ke email anda');
                return Redirect::back();
            }
        } else {
            flash()->message('gagal reset, email salah');
            return redirect()->back();
        }
    }

    public function getRecoverPassword($code)
    {
        $user = User::where('code', '=', $code)
            ->where('password_tmp', '!=', '');

        if ($user->count()) {
            $user = $user->first();

            $user->password = $user->password_tmp;
            $user->password_tmp = '';
            $user->code = '';

            if ($user->save()) {
                flash()->success('sukses mereset password anda', 'selamat');
                return redirect(action('LoginController@index'));
            }
        }
        flash()->error('gagal merecovery password anda');
        return redirect(action('LoginController@index'));
    }

    public function getGantiPassword()
    {
        return view('frontend.password.formGantiPassword');
    }

    public function postGantiPassword(GantiPasswordRequest $request)
    {
        $newPassword = Input::get('passwordLama');
        $oldPassword = Auth::user()->getAuthPassword();

        $passwordBaru = Input::get('passwordBaru');

        if (Hash::check($newPassword, $oldPassword)) {

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($passwordBaru);
            $user->save();

            flash()->overlay('Password berhasil di ganti', 'Horee');

            return redirect::back();
        } else {
            flash()->error('Gagal mengganti password, salah memasukan password lama !!');
            return redirect::back();
        }
    }

}
