<?php

Route::get('/', 'LoginController@home')->name('home');

Route::get('/login', 'LoginController@login')->name('login');

Route::post('/login', 'LoginController@postLogin')->name('login.post');

Route::get('/register', 'RegisterController@register')->name('register');

Route::post('/register', 'RegisterController@postRegister')->name('register.post');

Route::get('/emp/login', 'LoginController@empLogin')->name('emp.login');

Route::post('/emp/login', 'LoginController@postEmpLogin')->name('emp.login.post');

Route::get('/logout', 'LoginController@logout')->name('logout');


// ADMIN ROUTE GROUP
Route::group(['prefix' => 'admin', 'middleware' => 'check_admin'], function () {
	// ADMIN DASHBOARD
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	// ADMIN DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('admin.dashboard');
	});

});


// FACULTY ROUTE GROUP
Route::group(['prefix' => 'faculty', 'middleware' => 'check_faculty'], function () {
	// FACULTY DASHBOARD
	Route::get('/dashboard', 'FacultyController@dashboard')->name('faculty.dashboard');
	// FACULTY DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('faculty.dashboard');
	});

});


// STUDENT ROUTE GROUP
Route::group(['prefix' => 's', 'middleware' => 'check_student'], function () {
	// STUDENT DASHBOARD
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
	// STUDENT DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('student.dashboard');
	});

});