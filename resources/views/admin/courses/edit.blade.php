@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Course \ Edit \ {{$course->name}}</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('courses.index') }}"> Back</a>
     </div>
     @include('admin.inc.errors')

     <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


         <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="name" class="form-control" value="{{$course->name}}" placeholder="name">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Category</strong>
            <select class="form-control" name="cat_id" >
        @foreach($cats as $cat)
        <option value="{{$cat->id}}" @if ($course->cat_id == $cat->id) selected @endif>{{$cat->name}}</option>
        @endforeach
                </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Trainer</strong>
                <select class="form-control" name="trainer_id">
                @foreach($trainers as $trainer)
        <option value="{{$trainer->id}}" @if ($course->trainer_id == $trainer->id) selected @endif>{{$trainer->name}}</option>
              @endforeach

                </select>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Small Desc</strong>
		            <input type="text" name="small_desc" class="form-control" placeholder="small_desc" value="{{$course->small_desc}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Desc</strong>
                    <textarea name="desc" class="form-control" cols="30" rows="10">{{$course->desc}}</textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price</strong>
		            <input type="number" name="price" class="form-control" placeholder="Price" value="{{$course->price}}">
		        </div>
		    </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="{{asset('uploads/courses/'.$course->img)}}" width="300px" hieght="50px">
		        <div class="form-group">
		            <strong>Image</strong><br>
		            <input type="file" name="img" class="form-control-file " placeholder="Image">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>


@endsection
