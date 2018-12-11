<?php

Route::get('/', 'LoginController@home')->name('home');

Route::get('/login', 'LoginController@login')->name('login');

Route::post('/login', 'LoginController@postLogin')->name('login.post');

Route::get('/register', 'RegisterController@register')->name('register');

Route::post('/register', 'RegisterController@postRegister')->name('register.post');



Route::get('/dashboard', function () {
	return view('dashboard');
});