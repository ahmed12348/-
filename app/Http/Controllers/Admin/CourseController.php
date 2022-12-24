<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Cat;
use App\Models\Trainer;
use Image;
class CourseController extends Controller
{
    public function index()
    {
       $data['courses']=Course::select('id','name','price','img')->get();
       return view('admin.courses.index')->with($data);
    }
    public function create()
    {
        $data['cats']=Cat::select('id','name')->get();
        $data['trainers']=Trainer::select('id','name')->get();
        return view('admin.courses.create')->with($data);
    }

    public function store(Request $request)
    {
       request()->validate([
            'name' => 'required|string|max:50',
            'small_desc' => 'required|string|max:170',
            'desc' => 'required|string',
            'price' => 'required|string|max:6',
            'cat_id' => 'required|exists:cats,id',
            'trainer_id' => 'required|exists:trainers,id',
            'img' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();


        if ($image = $request->file('img')) {
            $destinationPath = 'uploads/courses/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }


        Course::create($input);
        return redirect()->route('courses.index')
        ->with('success','course created successfully.');

    }

    public function edit(Course $course)
    {
        $data['cats']=Cat::select('id','name')->get();
        $data['trainers']=Trainer::select('id','name')->get();
        return view('admin.courses.edit',compact('course'))->with($data);
    }


    public function update(Request $request, Course $course)
    {
       $request->validate([
        'name' => 'required|string|max:50',
        'small_desc' => 'required|string|max:170',
        'desc' => 'required|string',
        'price' => 'required|string|max:6',
        'cat_id' => 'required|exists:cats,id',
        'trainer_id' => 'required|exists:trainers,id',
        'img' => 'nullable|image|mimes:jpg,jpeg,png',

        ]);

        $input = $request->all();
        if ($image = $request->file('img')) {
            $destinationPath = 'uploads/courses/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['img'] = "$profileImage";
        }else{
            unset($input['img']);
        }

        $course->update($input);

        return redirect()->route('courses.index')
                        ->with('success','course updated successfully');

    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')
                        ->with('success','course deleted successfully');
    }
}
