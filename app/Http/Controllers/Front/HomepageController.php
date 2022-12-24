<?php

namespace App\Http\Controllers\Front;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Student;
use App\Models\SiteContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

   public function index(){
    $banner=$data['banner']=SiteContent::select('content')->where('name','banner')->first();
    $course=$data['course']=SiteContent::select('content')->where('name','courses')->first();
    $courses=$data['courses']=Course::select('id','name','small_desc','cat_id','trainer_id','img','price')
       ->orderBy('id','desc')
       ->take(3)
       ->get();

       $course_num=Course::count();
       $student_num=Student::count();
       $trainer_num=Trainer::count();
       return view('front.index', compact('courses','course_num','student_num','trainer_num','banner','course'));

   }
}
