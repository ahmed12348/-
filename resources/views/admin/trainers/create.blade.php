@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Trainer \ Create</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('trainers.index') }}"> Back</a>
     </div>

      @include('admin.inc.errors')
     <form action="{{ route('trainers.store') }}" method="POST" enctype="multipart/form-data" >
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="name" class="form-control" placeholder="name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Phone</strong>
		            <input type="text" name="phone" class="form-control" placeholder="phone">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Specialize</strong>
		            <input type="text" name="spec" class="form-control" placeholder="spec">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Image</strong><br>
		            <input type="file" name="img" class="form-control-file " placeholder="Image">
		        </div>
		    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 ">

		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
 </div>












@endsection
