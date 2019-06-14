<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Section;
use App\StudentInfo;
use Auth;
use App\Http\Controllers\AuditTrailController;

class UserController extends Controller
{

    // COMMON FOR ALL USERS

    // CHANGE PASSWORD
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        $old_password = $request['old_password'];
        $password = $request['password'];


        if(!password_verify($old_password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Old Password Incorrect!');
        }

        Auth::user()->password = bcrypt($password);

        if(Auth::user()->save()) {

            $action = 'Updated Profile';
            AuditTrailController::create($action);
            return redirect()->back()->with('success', 'Password Updated!');
        }

        return redirect()->back()->with('error', 'Password Failed to Update!');
    }


    // UPDATE PROFILe
    public function postProfileUpdate(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email',
            'mobile_number' => 'nullable|numeric'
        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $mobile_number = $request['mobile_number'];

        $user = Auth::user();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->mobile_number = $mobile_number;

        if($user->save()) {

            $action = 'Changed Password';
            AuditTrailController::create($action);
            return redirect()->back()->with('success', 'Profile Updated!');
        }

        return redirect()->back()->with('error', 'Failed to Update Profile!');
        
    }




    // ADMIN SIDE
    
    // ADMIN MANAGEMENT
    public function admins()
    {
        return view('admin.admins');
    }


    // add admin
    public function addAdmin()
    {
        return view('admin.admin-add-edit', ['admin' => NULL]);
    }


    // method use to store admin
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'admin_id' => 'required|max:7',
            'dep_ed_email' => 'required',
            'mobile_number' => 'required',
            'position' => 'required'
        ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $admin_id = $request['admin_id'];
        $email = $request['dep_ed_email'];
        $mobile_number = $request['mobile_number'];
        $position = $request['position'];

        $user_id = $request['user_id'];

        // save
        if($user_id == NULL) {
            $admin = new User();
            $admin->password = bcrypt('12345678');
            $admin->user_type = 1;
            $action = 'Added New Admin';
        }
        else {
            $admin = User::findorfail($user_id);
            $action = 'Admin Details Updated';
        }

        $admin->firstname = $firstname;
        $admin->lastname = $lastname;
        $admin->employee_id = $admin_id;
        $admin->email = $email;
        $admin->mobile_number = $mobile_number;
        $admin->position = $position;

        // condition
        if($admin->save()) {

            AuditTrailController::create($action);
            
            return redirect()->route('admin.add.admin')->with('success', 'Admin Details Saved');
        }

        // return redirect
        return redirect()->route('admin.add.admin')->with('error', 'Error Occured! Please Try Again Later.');
    }


    // method use to view admin details
    public function viewAdmin($id = NULL)
    {
        $id = $this->core->decryptString($id);

        $admin = User::findorfail($id);

        return view('admin.admin-view', ['admin' => $admin]);
    }


    // method use to edit/update admin
    public function updateAdmin($id = NULL)
    {
        $id = $this->core->decryptString($id);

        $admin = User::findorfail($id);

        return view('admin.admin-add-edit', ['admin' => $admin]);
    }


    // method use to reset password
    public function resetPasswordAdmin($id = NULL)
    {
        $id = $this->core->decryptString($id);

        $admin = User::findorfail($id);

        return view('admin.admin-reset-password', ['admin' => $admin]);
    }


    // method use to reset password of admin
    public function postResetPasswordAdmin(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $admin_id = $request['admin_id'];

        $password = $request['password'];


        $admin = User::findorfail($admin_id);

        $admin->password = bcrypt($password);

        if($admin->save()) {

            $action = 'Admin Password Reset Successfully';
            AuditTrailController::create($action);
            
            return redirect()->route('admin.admins')->with('success', 'Admin Password Changed');
        }

        return redirect()->route('admin.admins')->with('error', 'Error in changing password. Please Try Again Later.');
    }


    public function removeAdmin($id = NULL)
    {
        $admin = User::findorfail($id);

        $admin->active = 0;

        $admin->save();

        $action = 'Removed Admin';
        AuditTrailController::create($action);
    }


    // FACULTY MANAGEMENT
    public function faculties()
    {
    	return view('admin.faculties');
    }


    // ADD FACULTY
    public function createFaculty()
    {
        $dept = \App\Department::where('active', 1)->get();

        return view('admin.faculty-add-edit', ['faculty' => null, 'dept' => $dept]);
    }


    // STORE/UPDATE FACULTY
    public function storeFaculty(Request $request)
    {
        $faculty_id = $request['faculty_id'];

        if($faculty_id == null) {

            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'employee_id' =>'required|unique:users,employee_id|max:7',
                'email' => 'nullable|unique:users,email|email',
                'mobile_number' => 'nullable|unique:users,mobile_number',
                'department' => 'required',
                'position' => 'required'
            ]);

            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $employee_id = $request['employee_id'];
            $email = $request['email'];
            $mobile_number = $request['mobile_number'];
            $department = $request['department'];
            $position = $request['position'];

            // add to database
            $f = new User();
            $f->firstname = $firstname;
            $f->lastname = $lastname;
            $f->employee_id = $employee_id;
            $f->email = $email;
            $f->mobile_number = $mobile_number;
            $f->password = bcrypt('12345678');
            $f->user_type = 2; // faculty
            $f->position = $position;

            // if save is success, add activity log and return back with message
            if($f->save()) {

                $designation = new \App\FacultyDesignation();
                $designation->user_id = $f->id;
                $designation->department_id = $department;
                $designation->save();

                $action = 'Added New Faculty';
                AuditTrailController::create($action);

                return redirect()->route('admin.add.faculty')->with('success', 'Faculty Added!');
            }
        }
        else {

            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'employee_id' =>'required',
                'email' => 'nullable',
                'mobile_number' => 'nullable',
                'department' => 'required',
                'position' => 'required'
            ]);

            $firstname = $request['firstname'];
            $lastname = $request['lastname'];

            $employee_id = $request['employee_id'];
            $email = $request['email'];
            $mobile_number = $request['mobile_number'];
            $department = $request['department'];
            $position = $request['position'];


            $f = User::findorfail($faculty_id);

            // check employee id 
            if(!$this->core->check_employee_id($employee_id, $f->employee_id)) {
                return redirect()->back()->with('error', 'Employee ID Already In Use');
            }

            // check email
            if(!$this->core->check_email($email, $f->email)) {
                return redirect()->back()->with('error', 'Email Already In Use');
            }

            // check mobile number

            $f->firstname = $firstname;
            $f->lastname = $lastname;
            $f->employee_id = $employee_id;
            $f->email = $email;
            $f->mobile_number = $mobile_number;
            $f->password = bcrypt('secret');
            $f->user_type = 2; // faculty
            $f->position = $position;

            if($f->save()) {

                if(!empty($f->designation)) {
                    $f->designation->department_id = $department;
                }
                else {
                    $f->designation = new \App\FacultyDesignation();
                    $f->designation->user_id = $f->id;
                    $f->designation->department_id = $department;
                }

                $f->designation->save();

                $action = 'Faculty Details Updated';
                AuditTrailController::create($action);

                return redirect()->route('admin.faculties')->with('success', 'Faculty Updated!');
            }
        }

        return redriect()->route('admin.faculties')->with('error', 'Data Not Save! Please Try Again Later!');
    }


    // EDIT FACULTY
    public function updateFaculty($id = null)
    {
        $id = decrypt($id);

        $faculty = User::findorfail($id);
        $dept = \App\Department::where('active', 1)->get();

        return view('admin.faculty-add-edit', ['faculty' => $faculty, 'dept' => $dept]);    
    }



    // method use to reset password of faculty
    public function facultyResetPassword($id)
    {
        $id = decrypt($id);

        $faculty = User::findorfail($id);

        return view('admin.faculty-reset-password', ['faculty' => $faculty]);
    }


    // method use to reset password with save function
    public function postFacultyResetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $id = $request['faculty_id'];
        $password = $request['password'];

        $faculty = User::findorfail($id);

        $faculty->password = bcrypt($password);
        
        if($faculty->save()) {

            $action = 'Faculty Password Reset Successfully';
            AuditTrailController::create($action);

            return redirect()->route('admin.faculties')->with('success', 'Password Reset Successful!');
        }

        return redirect()->route('admin.faculties')->with('error', 'Password Reset Error. Please Try Again!');

    }


    // ALL ADMINS
    public function allAdmins()
    {
        // get all faculties
        $admins = User::where('user_type', 1)->where('active', 1)->get();

        // format to follow
        $data = array(
            'fistname' => null,
            'lastname' => null,
            'admin_id' => null,
            'action' => null
        );

        if(count($admins) > 0) {

            $data = null;

            foreach($admins as $a) {

                if($a->id != 1) {
                    $data[] = [
                        'firstname' => strtoupper($a->firstname),
                        'lastname' => strtoupper($a->lastname),
                        'admin_id' => $a->employee_id,
                        'action' => "<a href='" . route('admin.view.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</a> <a href='" . route('admin.update.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <a href='" . route('admin.reset.password.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> Reset Password</a> <button class='btn btn-danger btn-xs' onclick=\"remove_admin('" . $a->id . "')\"><i class='fa fa-trash'></i> Delete</button>"
                    ];
                }
                else {
                    $data[] = [
                        'firstname' => strtoupper($a->firstname),
                        'lastname' => strtoupper($a->lastname),
                        'admin_id' => $a->employee_id,
                        'action' => "<a href='" . route('admin.view.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</a> <a href='" . route('admin.update.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <a href='" . route('admin.reset.password.admin', ['id' => encrypt($a->id)]) . "' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> Reset Password</a>"
                    ];
                }

            }
        }

        return $data;
    }


    // ALL FACULTIES
    public function allFaculties()
    {
        // get all faculties
        $faculties = User::where('user_type', 2)->where('active', 1)->get();

        // format to follow
        $data = array(
            'fistname' => null,
            'lastname' => null,
            'employee_id' => null,
            'action' => null
        );

        if(count($faculties) > 0) {

            $data = null;

            foreach($faculties as $f) {

                $data[] = [
                    'firstname' => strtoupper($f->firstname),
                    'lastname' => strtoupper($f->lastname),
                    'employee_id' => $f->employee_id,
                    'action' => "<a href='" . route('admin.update.faculty', ['id' => encrypt($f->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <a href='" . route('admin.faculty.reset.password', ['id' => encrypt($f->id)]) . "' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> Reset Password</a> <button class='btn btn-danger btn-xs' onclick=\"remove_faculty('" . $f->id . "')\"><i class='fa fa-trash'></i> Delete</button>"
                ];

            }
        }

        return $data;
    }




    // REMOVE FACULTY IN THE RECORD
    public function remove_faculty($id)
    {
        $faculty = User::findorfail($id);
        $faculty->active = 0;

        if($faculty->save()) {
            $action = 'Removed Faculty!';
            AuditTrailController::create($action);
        }

    }




    // STUDENT MANAGEMENT
    public function students()
    {
    	return view('admin.students');
    }


    // ALL STUDENTS
    public function allStudents()
    {
        $data = array(
            'firstname' => null,
            'lastname' => null,
            'lrn' => null,
            'action' => null
        );

        $students = User::where('user_type', 3)->where('active', 1)->orderBy('lastname', 'asc')->get();

        if(count($students) > 0) {

            $data = null;

            foreach($students as $s) {
                $data[] = [
                    'firstname' => $s->firstname,
                    'lastname' => $s->lastname,
                    'lrn' => substr($s->student_number, 4),
                    'action' => "<a href=" . route('admin.student.view.details', ['id' => encrypt($s->id)]) . " class='btn btn-primary btn-xs'><i class='fa fa-eye'></i> View</a> <a href='" . route('admin.reset.student.password', ['id' => encrypt($s->id)]) . "' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> Reset Password</a>"
                ];
            }
        }

        return $data;
    }




    // method use to view details of student user in admin
    public function studentViewDetails($id)
    {
        $id = decrypt($id);

        $student = User::findorfail($id);

        // return $student->student_section->section->name;

        return view('admin.student-details', ['student' => $student]);
    }


    // method use to reset password of student
    public function resetStudentPassword($id)
    {
        $id = decrypt($id);

        $student = User::findorfail($id);

        return view('admin.student-reset-password', ['student' => $student]);
    }


    // method use to reset password and save
    public function postResetStudentPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $id = $request['student_id'];
        $password = $request['password'];

        $student = User::findorfail($id);

        $student->password = bcrypt($password);
        
        if($student->save()) {
            $action = 'Student Password Reset Successfully';
            AuditTrailController::create($action);


            return redirect()->route('admin.students')->with('success', 'Password Reset Successful!');
        }

        return redirect()->route('admin.students')->with('error', 'Password Reset Error. Please Try Again!');   
    }

    // method use to print list of students
    public function printStudentList()
    {
        return view('admin.students-print-list');
    }





    // FACULTY SIDE
    // CHOOSE GRADE LEVEL
    public function registrationGradeLevel($id = 1)
    {
        // check enrollment if turned on
        if(!$this->core->checkEnrollment()) {
            return redirect()->back()->with('error', 'Enrollment is Inactive! Please Report to Administrator');
        }

        if($id != 1 && $id != 2) {
            return redirect()->route('faculty.dashboard')->with('error', 'Error! Please Try Again Later!');
        }

        return view('faculty.student-new-grade-level', ['id' => $id]);
    }


    // CHOOSE SECTION
    public function registrationSection(Request $request)
    {
        $request->validate([
            'grade_level' => 'required'
        ]);

        $id = $request['id'];
        $grade_level = $request['grade_level'];

        // sections based on grade level
        $sections = Section::where('grade_level', $grade_level)->where('active', 1)->orderBy('name', 'asc')->get();

        return view('faculty.student-new-section', ['id' => $id, 'grade_level' => $grade_level, 'sections' => $sections]);
    }

    // NEW STUDENT REGISTRATION
    public function newStudentRegistration(Request $request)
    {
        $request->validate([
            'section' => 'required'
        ]);

        $id = $request['id'];
        $grade_level = $request['grade_level'];
        $section_id = $request['section'];

        $section = Section::findorfail($section_id);

        return view('faculty.student-new-registration', ['grade_level' => $grade_level, 'section' => $section]);
    }


    // SAVE NEW STUDENT REGISTRATION
    public function saveNewStudentRegistration(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'lrn' => 'required|max:16',
            'gender' => 'required',
            'nationality' => 'required',
            'email' => 'nullable',
            'birthday' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'birth_certificate' => 'required',
            'form_137' => 'required',
            'good_moral_character' => 'required'
        ]);

        $grade_level = $request['grade_level'];
        $section_id = $request['section_id'];

        // check if slot is full
        $section = Section::findorfail($section_id);

        if($section->enrolled == $section->student_limit) {
            return redirect()->route('faculty.register.choose.grade')->with('error', 'Section slot is full');
        }

        $firstname = $request['firstname'];
        $middlename = $request['middlename'];
        $lastname = $request['lastname'];
        $prefix = $request['suffix_name'];
        $lrn = $request['lrn'];
        $gender = $request['gender'];
        $nationality = $request['nationality'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $email = $request['email'];
        $address = $request['address'];
        $father = $request['father'];
        $mother = $request['mother'];
        $f_number = $request['fathers_contact_number'];
        $m_number = $request['mothers_contact_number'];
        $birth_certificate = $request['birth_certificate'];
        $form_137 = $request['form_137'];
        $gmc = $request['good_moral_character'];

        // check lrn if already in used
        $check_lrn = User::where('student_number', $lrn)->first();

        if(!empty($check_lrn)) {
            return redirect()->back()->with('error', 'LRN  ' . $lrn . ' is already used!');
        }

        $student = new User();
        $student->firstname = $firstname;
        $student->middlename = $middlename;
        $student->lastname = $lastname;
        $student->prefix_name = $prefix;
        $student->student_number = $lrn;
        $student->user_type = 3; // student
        $student->password = bcrypt('12345678');
        $student->email = $email;
        $student->save();

        $info = new StudentInfo();
        $info->grade_level = $grade_level;
        $info->section_id = $section->id;
        $info->user_id = $student->id;
        $info->gender = $gender;
        $info->birthday = $birthday;
        $info->nationality = $nationality;
        $info->address = $address;
        $info->father = $father;
        $info->mother = $mother;
        $info->fathers_contact_number = $f_number;
        $info->mothers_contact_number = $m_number;
        $info->birth_certificate = $birth_certificate;
        $info->form_137 = $form_137;
        $info->good_moral_character = $gmc;
        $info->save();

        // increment number of enrolled student in the section
        $section->enrolled += 1;
        $section->save();

        // year student count
        // $academic_year = date('Y') . '-' . date('Y', strtotime("+1 year"));
        $academic_year = \App\SchoolYear::whereActive(1)->first();

        $enrolled_counter = \App\EnrolledStudentCounter::where('academic_year', $academic_year)
            ->where('active', 1)
            ->first();

        if(empty($enrolled_counter)) {
            $enrolled_counter = new \App\EnrolledStudentCounter();
            $enrolled_counter->academic_year = $academic_year->from . '-' . $academic_year->to;
            $enrolled_counter->count = 1;
            $enrolled_counter->save();
        }
        else {
            $enrolled_counter->count += 1;
            $enrolled_counter->save();            
        }


        // section and student enrollment record
        $student_section = new \App\StudentSection();
        $student_section->user_id = $student->id;
        $student_section->section_id = $section->id;
        $student_section->grade_level = $grade_level;
        $student_section->save();



        // add enrollment history of the student
        $std_enrollment = new \App\StudentEnrollmentHistory();
        $std_enrollment->user_id = $student->id;
        $std_enrollment->student_section_id = $student_section->id;
        $std_enrollment->school_year = $academic_year->from . '-' . $academic_year->to;
        $std_enrollment->save();



        $action = 'Enrolled New Student';
        AuditTrailController::create($action);

        // return with cor print
        // get subjects
        $subjects = \App\Subject::where('grade_level', $student_section->grade_level)->whereActive(1)->get();

        return view('faculty.student-show-cor', ['subjects' => $subjects, 'section' => $section, 'student' => $student, 'message' => 'Student Successfully Enrolled!']);

        return redirect()->route('faculty.register.choose.grade')->with('success', 'Student Enrolled!');

        
    }


    // EXISTING STUDENT REGISTRATION
    public function existingStudentRegistration(Request $request)
    {
        // return $request;

        $id = $request['id'];
        $grade_level = $request['grade_level'];
        $section = $request['section'];

        // pass parameters to view and use it as a reference on enrolling existing student

        return view('faculty.student-existing-registration', ['id' => $id, 'grade_level' => $grade_level, 'section_id' => $section]);
    }



    // existing student search to regsiter
    public function searchExistingStudentToRegister(Request $request)
    {
        $request->validate([
            'keyword' => 'required'
        ]);

        $id = $request['id'];
        $grade_level = $request['grade_level'];
        $section = $request['section_id'];
        $keyword = $request['keyword'];

        // search student with the keyword

        $students = User::where('user_type', 3)
                            ->where('student_number', 'like', "%$keyword%")
                            ->get();

        return view('faculty.student-existing-registration-search-result', ['id' => $id, 'grade_level' => $grade_level, 'section_id' => $section, 'students' => $students]);
    }


    public function enrollExsitingStudent(Request $request)
    {

        $id = $request['id'];
        $grade_level = $request['grade_level'];
        $section_id = $request['section_id'];
        $student_id = $request['student_id'];

        $section = Section::findorfail($section_id);

        // get subjects
        $subjects = \App\Subject::where('grade_level', $grade_level)
                        ->whereActive(1)
                        ->get();

        $academic_year = \App\SchoolYear::whereActive(1)->first();

        $student = \App\User::findorfail($student_id);

        $student->info->grade_level = $grade_level;
        $student->info->section_id = $section->id;
        $student->info->save();


        $section->enrolled += 1;
        $section->save();

        // add new student section
        $student_section = new \App\StudentSection();
        $student_section->section_id = $section->id;
        $student_section->grade_level = $grade_level;
        $student_section->user_id = $student->id;
        $student_section->save();


        // add enrollment history for the student
        $std_enrollment = new \App\StudentEnrollmentHistory();
        $std_enrollment->user_id = $student->id;
        $std_enrollment->student_section_id = $student_section->id;
        $std_enrollment->school_year = $academic_year->from . '-' . $academic_year->to;
        $std_enrollment->save();



        return view('faculty.student-show-cor', ['student' => $student, 'section' => $section, 'subjects' => $subjects, 'message' => 'Student Successfully Enrolled!']);
    }

}
