@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>student \ Edit \ {{$student->name}}</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('students.index') }}"> Back</a>
     </div>
     @include('admin.inc.errors')

     <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


         <div class="row">

         <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="name" class="form-control" value="{{$student->name}}" placeholder="name">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email</strong>
		            <input type="email" name="email" class="form-control" value="{{$student->email}}" placeholder="Email">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Spec</strong>
		            <input type="text" name="spec" class="form-control" value="{{$student->spec}}" placeholder="Spec">
		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>


@endsection
