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

    // FACULTY MANAGEMENT
    public function faculties()
    {
    	return view('admin.faculties');
    }


    // ADD FACULTY
    public function createFaculty()
    {
        return view('admin.faculty-add-edit', ['faculty' => null]);
    }


    // STORE/UPDATE FACULTY
    public function storeFaculty(Request $request)
    {
        $faculty_id = $request['faculty_id'];

        if($faculty_id == null) {

            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'employee_id' =>'required|unique:users,employee_id',
                'email' => 'nullable|unique:users,email|email',
                'mobile_number' => 'nullable|unique:users,mobile_number'
            ]);

            $firstname = $request['firstname'];
            $lastname = $request['lastname'];
            $employee_id = $request['employee_id'];
            $email = $request['email'];
            $mobile_number = $request['mobile_number'];

            // add to database
            $f = new User();
            $f->firstname = $firstname;
            $f->lastname = $lastname;
            $f->employee_id = $employee_id;
            $f->email = $email;
            $f->mobile_number = $mobile_number;
            $f->password = bcrypt('secret');
            $f->user_type = 2; // faculty

            // if save is success, add activity log and return back with message
            if($f->save()) {
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
                'mobile_number' => 'nullable'
            ]);

            $firstname = $request['firstname'];
            $lastname = $request['lastname'];

            $employee_id = $request['employee_id'];
            $email = $request['email'];
            $mobile_number = $request['mobile_number'];


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

            if($f->save()) {
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

        return view('admin.faculty-add-edit', ['faculty' => $faculty]);    }


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
                    'action' => "<a href='" . route('admin.update.faculty', ['id' => encrypt($f->id)]) . "' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Update</a> <button class='btn btn-danger btn-xs' onclick=\"remove_faculty('" . $f->id . "')\"><i class='fa fa-trash'></i> Delete</button>"
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
                    'lrn' => $s->student_number,
                    'action' => "<button class='btn btn-primary btn-xs'>Action</button>"
                ];
            }
        }

        return $data;
    }






    // FACULTY SIDE
    // CHOOSE GRADE LEVEL
    public function registrationGradeLevel($id = 1)
    {
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
            'lrn' => 'required|max:6',
            'gender' => 'required',
            'nationality' => 'required',
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
        $prefix = $request['prefix'];
        $lrn = 'LRN-106702' . $request['lrn'];
        $gender = $request['gender'];
        $nationality = $request['nationality'];
        $birthday = date('Y-m-d', strtotime($request['birthday']));
        $address = $request['address'];
        $father = $request['father'];
        $mother = $request['mother'];
        $birth_certificate = $request['birth_certificate'];
        $form_137 = $request['form_137'];
        $gmc = $request['good_moral_character'];


        $student = new User();
        $student->firstname = $firstname;
        $student->middlename = $middlename;
        $student->lastname = $lastname;
        $student->prefix_name = $prefix;
        $student->student_number = $lrn;
        $student->user_type = 3; // student
        $student->password = bcrypt('12345678');
        $student->save();

        $info = new StudentInfo();
        $info->grade_level = $grade_level;
        $info->user_id = $student->id;
        $info->gender = $gender;
        $info->birthday = $birthday;
        $info->nationality = $nationality;
        $info->address = $address;
        $info->father = $father;
        $info->mother = $mother;
        $info->birth_certificate = $birth_certificate;
        $info->form_137 = $form_137;
        $info->good_moral_character = $gmc;
        $info->save();

        // increment number of enrolled student in the section
        $section->enrolled += 1;
        $section->save();


        $action = 'Enrolled New Student';
        AuditTrailController::create($action);

        return redirect()->route('faculty.register.choose.grade')->with('success', 'Student Enrolled!');

        
    }


    // EXISTING STUDENT REGISTRATION
    public function existingStudentRegistration(Request $request)
    {
        return $request;

        return view('faculty.student-existing-registration');
    }

}
