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

	Route::get('/faculty/{id}/reset/password', 'UserController@facultyResetPassword')->name('admin.faculty.reset.password');

	Route::post('/faculty/reset/password', 'UserController@postFacultyResetPassword')->name('admin.faculty.reset.password.post');

	Route::get('/admin/management', 'UserController@admins')->name('admin.admins');

	Route::get('/admin/add', 'UserController@addAdmin')->name('admin.add.admin');

	Route::post('/admin/add', 'UserController@storeAdmin')->name('admin.store.admin');

	Route::get('/admin/view/{id}', 'UserController@viewAdmin')->name('admin.view.admin');

	Route::get('/remove/admin/{id}', 'UserController@removeAdmin')->name('admin.remove.admin');

	Route::get('/admin/update/admin/{id}', 'UserController@updateAdmin')->name('admin.update.admin');

	Route::get('/admin/reset-password/admin/{id}', 'UserController@resetPasswordAdmin')->name('admin.reset.password.admin');

	Route::post('/admin/reset-password/admin', 'UserController@postResetPasswordAdmin')->name('admin.reset.password.admin.post');

	Route::get('/faculty/subject/assignments', 'FacultyAssignmentController@index')->name('admin.faculty.assignments');

	Route::get('/faculty/subject/assignments/add', 'FacultyAssignmentController@create')->name('admin.faculty.assignments.add');

	Route::post('/faculty/subject/assignments/add', 'FacultyAssignmentController@store')->name('admin.faculty.assignments.store');


	Route::get('/student/management', 'UserController@students')->name('admin.students');

	Route::get('/student/{id}/view/details', 'UserController@studentViewDetails')->name('admin.student.view.details');

	Route::get('/student/print/list', 'UserController@printStudentList')->name('admin.print.student.list');

	Route::get('/student/{id}/reset/password', 'UserController@resetStudentPassword')->name('admin.reset.student.password');

	Route::post('/student/reset/password', 'UserController@postResetStudentPassword')->name('admin.reset.student.password.post');


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

	Route::get('/schedule/add/grade/section', 'ScheduleController@create2')->name('admin.schedule.add2');

	Route::post('/schedule/add', 'ScheduleController@store')->name('admin.schedule.store');

	// ROOM MANAGEMENT
	Route::get('/room/management', 'RoomController@index')->name('admin.rooms');

	Route::get('/room/add', 'RoomController@create')->name('admin.room.add');

	Route::post('/room/add', 'RoomController@store')->name('admin.room.store');

	Route::get('/room/update/{id}', 'RoomController@update')->name('admin.room.update');


	// MAINTENANCE
	Route::get('/maintenance', 'MaintenanceController@home')->name('admin.maintenance');


	// SETTINGS
	Route::get('/settings', 'SettingController@index')->name('admin.settings');

	Route::post('/enrollment/toggle', 'SettingController@postToggleEnrollment')->name('admin.enrollment.toggle');

	Route::post('/semester/select', 'SettingController@postToggleSemester')->name('admin.semester.toggle');


	// ACTIVITY LOGS
	Route::get('/activity-logs', 'AuditTrailController@index')->name('admin.activity.logs');



	/**
	 * JSON DATA
	 */
	// ADD ADMINS
	Route::get('/all/admins', 'UserController@allAdmins')->name('all.admins');
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
	Route::get('/all/schedules', 'ScheduleController@allSchedules')->name('all.schedules');

	// ALL FACULTY ASSIGNMENT
	Route::get('/all/faculty/assignments', 'FacultyAssignmentController@allAssignment')->name('all.faculty.assignments');




	/**
	 * SCRIPT FOR REMOVING USERS TO LIST
	 */
	Route::get('/remove/faculty/{id}', 'UserController@remove_faculty')->name('admin.remove.faculty');

	Route::get('/remove/subject/{id}', 'SubjectController@remove')->name('admin.remove.subject');

	Route::get('/remove/section/{id}', 'SectionController@remove')->name('admin.remove.section');

	Route::get('/remove/strand/{id}', 'StrandController@remove')->name('admin.remove.strand');

	Route::get('/remove/room/{id}', 'RoomController@remove')->name('admin.remove.room');

	Route::get('/remove/schedule/{id}', 'ScheduleController@remove')->name('admin.remove.schedule');

	Route::get('/remove/faculty/assignment/{id}', 'FacultyAssignmentController@remove')->name('admin.remove.faculty.assignment');


	/*
	 * get records
	 */
	Route::get('/get/subjects/{id}', 'AdminController@getSubjects')->name('admin.get.subjects');


	/*
	 * get grade level based on the section id
	 */
	Route::get('/get/grade-level/{id}', 'AdminController@getGradeLevel')->name('admin.get.grade.level');


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

	// STUDENTS LIST OF ENROLLED UNDER ASSIGN SUBJECT
	Route::get('/my-students', 'FacultyController@myStudents')->name('faculty.my.students');



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


	// faculty subjects assigned
	Route::get('/subjects/assigned', 'FacultyController@assignedSubject')->name('faculty.assigned.subjects');

	// route to view students on the subject and section assigned
	Route::get('/subject/{subject_id}/section/{section_id}/view/students', 'FacultyController@subjectViewStudents')->name('faculty.view.students');

	// route to view student details on faculty
	Route::get('/student/{id}/view/details', 'FacultyController@studentViewDetails')->name('faculty.student.view.details');

	// route to encode grades in subject assigned to faculty
	Route::get('/subject/{subject_id}/section/{section_id}/encode/grades', 'FacultyController@encodeStudentGrades')->name('faculty.encode.grades');

	// route to save grades of students
	Route::post('/subject/encode/grades', 'GradeController@saveGrade')->name('faculty.save.grades');

	Route::get('/subject/encode/grades', function () {
		return redirect()->route('faculty.assigned.subjects');
	});


	// route to update student grade
	Route::post('/subject/update/grade/', 'GradeController@updateGrade')->name('faculty.update.grade');

	Route::get('/subject/update/grade', function () {
		return abort(404);
	});


	// schedule module for faculty
	Route::get('/my/schedules', 'FacultyController@schedules')->name('faculty.schedules');

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

	Route::get('/grades/all', 'GradeController@studentGrades')->name('student.grades.all');

	// student evaluation
	Route::get('/evaluation', 'StudentController@evaluation')->name('student.evaluation');


	// student scheule
	Route::get('/schedules', 'StudentController@schedules')->name('student.schedules');

});