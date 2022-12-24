@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Categories \ Edit \ {{$cat->name}}</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('cats.index') }}"> Back</a>
     </div>
     @include('admin.inc.errors')

     <form action="{{ route('cats.update',$cat->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="name" value="{{$cat->name}}">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>


@endsection
