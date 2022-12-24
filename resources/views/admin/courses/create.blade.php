@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Course \ Create</b></h6>
     <a class="btn btn-sm btn-primary" href="{{ route('courses.index') }}"> Back</a>
     </div>

      @include('admin.inc.errors')
     <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" >
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name</strong>
		            <input type="text" name="name" class="form-control" placeholder="name">
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Category</strong>
            <select class="form-control" name="cat_id">
        @foreach($cats as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
                </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Trainer</strong>
                <select class="form-control" name="trainer_id">
                @foreach($trainers as $trainer)
        <option value="{{$trainer->id}}">{{$trainer->name}}</option>
              @endforeach

                </select>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Small Desc</strong>
		            <input type="text" name="small_desc" class="form-control" placeholder="small_desc">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Desc</strong>
                    <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Price</strong>
		            <input type="number" name="price" class="form-control" placeholder="Price">
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
