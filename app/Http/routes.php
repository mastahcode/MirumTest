<?php


Route::resource('/','BlogFrontController',['only'=>['index']]);
Route::get('/{slug}','BlogFrontController@show');
Route::get('/category/{category}','BlogFrontController@showKategori');


//front
Route::resource('/auth/login','LoginController');

//FB
Route::get('/auth/facebook','FacebookLoginController@getFacebook');
Route::get('/auth/facebook/callback','FacebookLoginController@getDataFacebook');
Route::resource('auth/facebook','FacebookLoginController',['only'=>['create','store']]);

Route::post('/auth/login','LoginController@postLogin');
Route::get('/auth/logout','LoginController@getLogout');
Route::resource('/auth/register','RegisterController');

//Back
Route::resource('backend/blog','BlogBackendController');




