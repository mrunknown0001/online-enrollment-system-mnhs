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
Route::group(['prefix' => 'admin', 'middleware' => ['check_admin', 'prevent.back.history']], function () {
	// ADMIN DASHBOARD
	Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	// ADMIN DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('admin.dashboard');
	});

	// STUDENT AND FACULTY MANAGEMENT
	Route::get('/faculty/management', 'UserController@faculties')->name('admin.faculties');

	Route::get('/faculty/add', 'UserController@createFaculty')->name('admin.add.faculty');

	Route::post('/faculty/add', 'UserController@storeFaculty')->name('admin.store.faculty');

	Route::get('/faculty/update/{id}', 'UserController@updateFaculty')->name('admin.update.faculty');

	Route::get('/student/management', 'UserController@students')->name('admin.students');


	// SUBJECT MANAGEMENT
	Route::get('/subject/management', 'SubjectController@index')->name('admin.subjects');

	Route::get('/subject/add', 'SubjectController@create')->name('admin.add.subject');

	Route::post('/subject/add', 'SubjectController@store')->name('admin.store.subject');

	Route::get('/subject/update/{id}', 'SubjectController@update')->name('admin.update.subject');


	// SCHEDULES
	Route::get('/schedules', 'ScheduleController@index')->name('admin.schedules');


	// SETTINGS
	Route::get('/settings', 'SettingController@index')->name('admin.settings');


	// ACTIVITY LOGS
	Route::get('/activity-logs', 'AuditTrailController@index')->name('admin.activity.logs');



	/**
	 * JSON DATA
	 */
	// ALL FACULTIES
	Route::get('/all/faculties', 'UserController@allFaculties')->name('all.faculties');

	// ALL STUDENTS
	Route::get('/all/students', 'UserController@allStudents')->name('all.students');

	// ALL ACTIVITIES/AUDIT TRAIL
	Route::get('/all/activity-logs', 'AuditTrailController@allLogs')->name('all.activity.logs');

	// ALL SUBJECTS
	Route::get('/all/subjects', 'SubjectController@allSubjects')->name('all.subjects');




	/**
	 * SCRIPT FOR REMOVING USERS TO LIST
	 */
	Route::get('/remove/faculty/{id}', 'UserController@remove_faculty')->name('admin.remove.faculty');

	Route::get('/remove/subject/{id}', 'SubjectController@remove')->name('admin.remove.subject');

});


// FACULTY ROUTE GROUP
Route::group(['prefix' => 'faculty', 'middleware' => ['check_faculty', 'prevent.back.history']], function () {
	// FACULTY DASHBOARD
	Route::get('/dashboard', 'FacultyController@dashboard')->name('faculty.dashboard');
	// FACULTY DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('faculty.dashboard');
	});


	// STUDENTS
	Route::get('/student/enroll', 'UserController@enrollStudent')->name('faculty.enroll.student');

});


// STUDENT ROUTE GROUP
Route::group(['prefix' => 's', 'middleware' => ['check_student', 'prevent.back.history']], function () {
	// STUDENT DASHBOARD
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
	// STUDENT DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('student.dashboard');
	});

});