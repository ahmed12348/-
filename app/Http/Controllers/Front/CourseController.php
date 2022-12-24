<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Course;
class CourseController extends Controller
{
    public function cat($id)
    {
       $data['cat']=Cat::findOrFail($id);
       $data['courses']=Course::where('cat_id',$id)->paginate(6); //get course by categ

       return view('front.course.cat')->with($data);
    }
    public function show($id,$c_id)
    {
        $courses=Course::findOrFail($c_id);
       return view('front.course.show', compact('courses'));
    }

}
