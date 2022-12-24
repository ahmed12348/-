<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Image;
use DB;
class StudentController extends Controller
{
    public function index()
    {
       $data['students']=Student::select('id','name','email','spec')->get();
       return view('admin.students.index')->with($data);
    }
    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
       request()->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|max:170|unique:students',
            'spec' => 'nullable|string|max:50',
        ]);

        $input = $request->all();
        Student::create($input);
        return redirect()->route('students.index')
        ->with('success','student created successfully.');

    }

    public function edit(Student $student)
    {
        return view('admin.students.edit',compact('student'));
    }

    public function show($id)
    {

         $data['course']=Student::findorFail($id)->courses; //find course with student
         $data['student_id']=$id;
        return view('admin.students.show')->with($data);
    }



    public function update(Request $request, Student $student)
    {
       $request->validate([
        'name' => 'nullable|string|max:50',
        'email' => 'required|email|max:170|unique:students',
        'spec' => 'nullable|string|max:50',

        ]);

        $input = $request->all();
        $student->update($input);
        return redirect()->route('students.index')
                        ->with('success','student updated successfully');

    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')
                        ->with('success','student deleted successfully');
    }
    public function approveCourse($id,$c_id)
    {
        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
           'status' => 'approve'
        ]);
        return back();
    }
    public function rejectCourse($id,$c_id)
    {
        DB::table('course_student')->where('student_id',$id)->where('course_id',$c_id)->update([
           'status' => 'reject'
        ]);
        return back();
    }

    public function addCourse($id)
    {
      $data['student_id']=$id;
      $data['courses']=Course::select('id','name')->get();

        return view('admin.students.addCourse')->with($data);
    }
    public function storeCourse($id, Request $request)
    {
      $data= $request->validate([
          'course_id' => 'required|exists:courses,id'
      ]);
      DB::table('course_student')->insert([
        'student_id' => $id,
        'course_id' => $data['course_id'],
     ]);

        return redirect(route('students.show',$id));
    }
}
