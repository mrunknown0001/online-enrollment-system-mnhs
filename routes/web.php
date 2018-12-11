<?php

Route::get('/', 'LoginController@home')->name('home');

Route::get('/login', 'LoginController@login')->name('login');

Route::post('/login', 'LoginController@postLogin')->name('login.post');

Route::get('/register', 'RegisterController@register')->name('register');

Route::post('/register', 'RegisterController@postRegister')->name('register.post');


// ADMIN ROUTE GROUP
Route::group(['prefix' => 'admin'], function () {
	// ADMIN DASHBOARD
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});


// FACULTY ROUTE GROUP
Route::group(['prefix' => 'faculty'], function () {
	// FACULTY DASHBOARD
	Route::get('/dashboard', 'FacultyController@dashboard')->name('faculty.dashboard');
});


// STUDENT ROUTE GROUP
Route::group(['prefix' => 's'], function () {
	// STUDENT DASHBOARD
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
});