<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Student;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

// login  the student into the system
public function doLogin(Request $request)
{
    // user site validation of the student credentials
    $request->validate([
        'email' => 'required|email|exists:students,email',
        'password' => 'required|min:6|max:15',
    ], [
        'email.exists' => 'This email is not registered into our system',
    ]);
    // check the student credentials using the student middleware
    $check = $request->only('email', 'password');
    if (Auth::guard('student')->attempt($check)) {
        return redirect()->route('student.show', ['success' => 'Welcome to student page']);
    } else {
        return redirect()->back()->with('error', 'Login failed');
    }
}

       // logs in the student
       public function logout()
       {
           Auth::guard('student')->logout();

           return redirect()->view('welcome');
       }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $id = Auth::guard('student')->id;
        $id = Auth::user()->id;
        $results = Note::where('student_id', $id)->get();

        return view('dashboard.student.home', [
            'results' => $results,

    ]);
    }

// download student results
    public function Download()
    {
        $id = Auth::user()->id;
        $results = Note::where('student_id', $id)->get();

        $pdf = PDF::loadView('dashboard.student.file', compact('results'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'portrait');

        return $pdf->download('results.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
    }
}
