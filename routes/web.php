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

	// ADMIN PROFILE
	Route::get('/profile', 'AdminController@profile')->name('admin.profile');
	Route::post('/profile', 'UserController@postProfileUpdate')->name('admin.profile.update');

	// ADMIN PASSWORD
	Route::get('/password', 'AdminController@password')->name('admin.password');
	Route::post('/password', 'UserController@postChangePassword')->name('admin.password.update');

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

	// SENIOR HIGH SUBJECT MANAGEMENT
	Route::get('/subject/management/senior', 'SubjectController@seniorHighSubjects')->name('admin.senior.subjects');

	Route::get('/subject/senior/add', 'SubjectController@seniorCreate')->name('admin.add.senior.subject');

	Route::post('/subject/senior/add', 'SubjectController@storeSeniorSubject')->name('admin.senior.subject.store');

	Route::get('/subject/senior/update/{id}', 'SubjectController@updateSeniorSubject')->name('admin.update.senior.subject');


	// STRANDS MANAGEMENT
	Route::get('/strand/management', 'StrandController@index')->name('admin.strands');

	Route::get('/strand/add', 'StrandController@create')->name('admin.add.strand');

	Route::post('/strand/add', 'StrandController@store')->name('admin.store.strand');

	Route::get('/strand/update/{id}', 'StrandController@update')->name('admin.update.strand');


	// SECTION MANAGEMENT
	Route::get('/section/management', 'SectionController@index')->name('admin.sections');

	Route::get('/section/add', 'SectionController@create')->name('admin.add.section');

	Route::post('/section/add', 'SectionController@store')->name('admin.store.section');

	Route::get('/section/update/{id}', 'SectionController@update')->name('admi.update.section');


	// SCHEDULES
	Route::get('/schedules', 'ScheduleController@index')->name('admin.schedules');

	Route::get('/schedule/add', 'ScheduleController@create')->name('admin.schedule.add');

	// ROOM MANAGEMENT
	Route::get('/room/management', 'RoomController@index')->name('admin.rooms');

	Route::get('/room/add', 'RoomController@create')->name('admin.room.add');

	Route::post('/room/add', 'RoomController@store')->name('admin.room.store');

	Route::get('/room/update/{id}', 'RoomController@update')->name('admin.room.update');


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

	// ALL SENIOR HIGH SUBJECTS
	Route::get('/all/subjects/senior', 'SubjectController@allSubjectsSenior')->name('all.subjects.senior');

	// ALL SECTIONS
	Route::get('/all/sections', 'SectionController@allSections')->name('all.sections');

	// ALL STRANDS
	Route::get('/all/strands', 'StrandController@allStrands')->name('all.strands');

	// ALL ROOMS
	Route::get('/all/rooms', 'RoomController@allRooms')->name('all.rooms');	

	// ALL SCHEDULES 




	/**
	 * SCRIPT FOR REMOVING USERS TO LIST
	 */
	Route::get('/remove/faculty/{id}', 'UserController@remove_faculty')->name('admin.remove.faculty');

	Route::get('/remove/subject/{id}', 'SubjectController@remove')->name('admin.remove.subject');

	Route::get('/remove/section/{id}', 'SectionController@remove')->name('admin.remove.section');

	Route::get('/remove/strand/{id}', 'StrandController@remove')->name('admin.remove.strand');

	Route::get('/remove/room/{id}', 'RoomController@remove')->name('admin.remove.room');


});


// FACULTY ROUTE GROUP
Route::group(['prefix' => 'faculty', 'middleware' => ['check_faculty', 'prevent.back.history']], function () {
	// FACULTY DASHBOARD
	Route::get('/dashboard', 'FacultyController@dashboard')->name('faculty.dashboard');
	// FACULTY DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('faculty.dashboard');
	});

	// FACULTY PROFILE
	Route::get('/profile', 'FacultyController@profile')->name('faculty.profile');
	Route::post('/profile', 'UserController@postProfileUpdate')->name('faculty.profile.update');

	// FACULTY PASSWORD CHANGE
	Route::get('/password', 'FacultyController@password')->name('faculty.password');
	Route::post('/password', 'UserController@postChangePassword')->name('faculty.password.update');



	// REGISTRATION	
	// CHOOSE GRADE LEVEL
	Route::get('/student/register/grade/level/{id?}', 'UserController@registrationGradeLevel')->name('faculty.register.choose.grade');

	// CHOOSE SECTION
	Route::post('/student/register/section/', 'UserController@registrationSection')->name('faculty.register.choose.section');

	Route::get('/student/register/section/', function () {
		return redirect()->route('faculty.register.choose.grade');
	});

	// NEW STUDENT REGISTRATION
	Route::post('/student/register/new/', 'UserController@newStudentRegistration')->name('faculty.new.student.registration');

	Route::get('/student/register/new/', function () {
		return redirect()->route('faculty.register.choose.grade');
	});

	// save new student
	Route::post('/student/register/save', 'UserController@saveNewStudentRegistration')->name('faculty.save.new.student.registration');

	Route::get('/student/register/save', function () {
		return redirect()->route('faculty.register.choose.grade');
	});

	// EXISTING STUDENT REGISTRATION
	Route::post('/student/register/existing', 'UserController@existingStudentRegistration')->name('faculty.existing.student.registration');

	Route::get('/student/register/existing', function () {
		return redirect()->route('faculty.register.choose.grade');
	});

});


// STUDENT ROUTE GROUP
Route::group(['prefix' => 's', 'middleware' => ['check_student', 'prevent.back.history']], function () {
	// STUDENT DASHBOARD
	Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
	// STUDENT DASHBOARD REDIRECT
	Route::get('/', function () {
		return redirect()->route('student.dashboard');
	});


	// STUDENT PROFILE view only
	Route::get('/profile', 'StudentController@profile')->name('student.profile');

	// STUDENT PASSWORD CHANGE VIEW
	Route::get('/password', 'StudentController@password')->name('student.password');
	Route::post('/password', 'UserController@postChangePassword')->name('student.password.update');



	// STUDENT GRADES
	Route::get('/grades', 'GradeController@viewGrades')->name('student.grades');

});