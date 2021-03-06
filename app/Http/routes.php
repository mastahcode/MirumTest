<?php


Route::resource('/','BlogFrontController',['only'=>['index']]);
Route::get('about','BlogFrontController@aboutMe');
Route::get('/{slug}','BlogFrontController@show');
Route::get('/category/{category}','BlogFrontController@showKategori');


//front
Route::resource('/auth/login','LoginController');
Route::resource('auth/sosmed','SosmedController',['only'=>['create','store']]);
//FB
Route::get('/auth/facebook','FacebookLoginController@getFacebook');
Route::get('/auth/facebook/callback','FacebookLoginController@getDataFacebook');


//twitter
Route::get('/auth/twitter','TwitterLoginController@getTwitter');
Route::get('/auth/twitter/callback','TwitterLoginController@getDataTwitter');


Route::post('/auth/login','LoginController@postLogin');
Route::get('/auth/logout','LoginController@getLogout');
Route::resource('/auth/register','RegisterController');

//Back
Route::resource('backend/blog','BlogBackendController');

Route::resource('backend/admin','AdminController');

//password recover and change
Route::get('auth/reset','PasswordRecoverResetController@getPasswordReset');
Route::post('auth/reset','PasswordRecoverResetController@postResetPassword');
Route::get('auth/recover-password/{code}', 'PasswordRecoverResetController@getRecoverPassword');

//ganti password
Route::get('backend/change-password','PasswordRecoverResetController@getGantiPassword');
Route::post('backend/change-password','PasswordRecoverResetController@postGantiPassword');



