<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\Note;
use App\Models\Student;
use App\Models\Student_level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

// create courses
     public function createCourses(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'course_code' => 'required',
             'description' => 'required',
             'semester' => 'required',
             'level_id' => 'required',  // needs to be displayed on the front-en as a dropdown
             // 'userId' => 'required',
         ]);

         $course = new Course();
         $course->name = $request->name;
         $course->course_code = $request->course_code;
         $course->description = $request->description;
         $course->semester = $request->semester;
         $course->level_id = $request->level_id;
         $data = $course->save();
         if ($data) {
             return redirect()->back()->withSuccess('course saved successfully');
         } else {
             return redirect()->back()->withError('course not saved');
         }
     }

     // function to register marks/note/scores in the score table
public function createNotes(Request $request)
{
    $request->validate([
        'note_type' => 'required',
        'course_id' => 'required', // needs to be displayed on the front-end as dropdown
        'note' => 'required',
        'student_id' => 'required', // needs to be displayed on the front-end as a dropdown
    ]);

    $note = new Note();
    $note->note_type = $request->note_type;
    $note->course_id = $request->course_id;
    $note->student_id = $request->student_id;
    $note->note = $request->note;
    $data = $note->save();
    if ($data) {
        return redirect()->back()->withSuccess('note saved successfully');
    } else {
        return redirect()->back()->withError('note not saved');
    }
}

public function createLevels(Request $request)
{
    $request->validate([
        'level' => 'required',
         // needs to be displayed on the front-end as a dropdown
    ]);

    $level = new Level();
    $level->level = $request->level;
    $data = $level->save();
    if ($data) {
        return redirect()->back()->withSuccess('level saved successfully');
    } else {
        return redirect()->back()->withError('level not saved');
    }
}

// create user
     public function create(Request $request)
     {
         $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:6|max:15',
          'cpassword' => 'required|same:password',
         ], [
              'cpassword.same' => 'confirm password and password must match',
              'cpassword.required' => 'confirm password is required',
         ]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $data = $user->save();
         if ($data) {
             return redirect()->back()->withSuccess('User saved successfully');
         } else {
             return redirect()->back()->withError('User not saved');
         }
     }

 // create student
 public function createStudent(Request $request)
 {
     $request->validate([
         'first_name' => 'required',
         'second_name' => 'required',
         'gender' => 'required',
         'student_level' => 'required',
         'user_id' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:6|max:15',
         'cpassword' => 'required|same:password',
         // 'userId' => 'required',
     ], [
         'cpassword.same' => 'confirm password and password must match',
         'cpassword.required' => 'confirm password is required',
     ]);

     $student = new Student();
     $student->first_name = $request->first_name;
     $student->second_name = $request->second_name;
     $student->gender = $request->gender;
     $student->user_id = $request->user_id;
     $student->email = $request->email;
     $student->password = Hash::make($request->password);
     $data = $student->save();
     $id = DB::getPdo()->lastInsertId(); // id for the inserted student

     // for the student_level  create
     $student_level = new Student_level();
     $student_level->student_id = $id;
     $student_level->level_id = $request->student_level;
     $data = $student_level->save();
     if ($data) {
         return redirect()->back()->withSuccess('student saved successfully and level created too');
     } else {
         return redirect()->back()->withError('student not saved and levels');
     }
 }

// login the user
 public function doLogin(Request $request)
 {
     $request->validate([
         'email' => 'required|email',
         'password' => 'required|min:6|max:15',
     ]);
     $check = $request->only('email', 'password');
     if (Auth::guard('web')->attempt($check)) {
         return redirect()->route('user.home')->withSuccess('welcome to dashboard');
     } else {
         return redirect()->back()->withError('Login failed');
     }
 }

// logout user
 public function logout()
 {
     Auth::guard('web')->logout();

     return view('welcome');
 }

     // send student details un the viewDetail page
     public function viewDetails()
     {
         $students = DB::table('students')->get();
         $courses = DB::table('courses')->get();

         $marks = DB::table('notes')->get();
         $notes = Note::all(); // get the values of the foreignkeys on the note table

         //  return $note->course->name;
         return view('dashboard.user.viewStudent', [
             'marks' => $marks,
             'notes' => $notes,
             'students' => $students,
             'courses' => $courses,
            ]);
     }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    // return levels to the registerCourses page
    public function showLevels()
    {
        $levels = DB::table('levels')->get();

        return view('dashboard.user.registerCourses', ['levels' => $levels]);
    }

    // return gender, user_id to the registerStudent page
    public function showInfo()
    {
        $genders = DB::table('genders')->get();
        $user_ids = DB::table('users')->get();
        $levels = DB::table('levels')->get();

        return view('dashboard.user.registerStudent', [
            'genders' => $genders,
            'user_ids' => $user_ids,
            'levels' => $levels,
        ]);
    }

    // return info for the note register page
    public function showInfo2()
    {
        $student_ids = DB::table('students')->get();
        $course_ids = DB::table('courses')->get();
        // $courses = DB::table('courses')->get();
        return view('dashboard.user.registerNote', [
            'student_ids' => $student_ids,
            'course_ids' => $course_ids,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    // display student unique results in the user section
    public function showNotes($id)
    {
        $results = Note::where('student_id', $id)->get();

        return view('dashboard.user.showNotes', ['results' => $results]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $student_ids = Note::where('student_id', $id)->get();
        $student_id = Note::find($id);
        $course_ids = DB::table('courses')->get();
        $students = DB::table('students')->get();

        return view('dashboard.user.updateNotes', [
            'student_ids' => $student_ids,
            'student_id' => $student_id,
            'course_ids' => $course_ids,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Note $id)
    {
        $id->note_type = $request->note_type;
        $id->course_id = $request->course_id;
        $id->student_id = $request->student_id;
        $id->note = $request->note;
        $data = $id->save();
        if ($data) {
            return redirect()->route('user.viewDetails')->withSuccess('Update was successful!');
        } else {
            return redirect()->back()->withError('Was not not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function toDelete(Note $id)
    {
        return view('user.toDelete', compact('id'));
    }

    public function destroy($id)
    {
        Note::where('id', $id)->delete();

        return redirect()->route('user.viewDetails')->withSuccess('user was deleted successfully');
    }
}
