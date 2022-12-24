@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Trainer \ Edit \ {{$trainer->name}}</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('trainers.index') }}"> Back</a>
     </div>
     @include('admin.inc.errors')

     <form action="{{ route('trainers.update',$trainer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="name" value="{{$trainer->name}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Phone</strong>
		            <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$trainer->phone}}">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Specialize</strong>
		            <input type="text" name="spec" class="form-control" placeholder="spec" value="{{$trainer->spec}}">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="{{asset('uploads/trainers/'.$trainer->img)}}" width="200px" hieght="50px">
		        <div class="form-group">

		            <strong>Image</strong>

		            <input type="file" name="img" class="form-control-file">

		        </div>
		    </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>


@endsection
