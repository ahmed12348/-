@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>student \ Add Course</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('students.index') }}"> Back</a>
     </div>

      @include('admin.inc.errors')
     <form action="{{ route('students.storeCourse',$student_id) }}" method="POST" enctype="multipart/form-data" >
    	@csrf


         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Courses</strong>
            <select class="form-control" name="course_id">
        @foreach($courses as $course)
        <option value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
                </select>
                </div>





		    <div class="col-xs-12 col-sm-12 col-md-12 ">

		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>


@endsection
