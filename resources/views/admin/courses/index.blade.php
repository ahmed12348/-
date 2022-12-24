@extends('admin.app')


@section('content')

    <div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Courses</b></h6>
     <a class="btn btn-primary"  href="{{ route('courses.create') }}"> Add New</a>
     </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>


      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($courses as $course)
      <tr>

      <th scope="row">{{ $loop->iteration }}</th>
      <td> <img src="{{asset('uploads/courses/'.$course->img)}}"  width="50px" alt=""></td>
      <td>{{$course->name}}</td>

      <td>
          @if($course->price !== null)
          {{$course->price}} $
          @else Not Exist @endif
        </td>


      <td>
      <form action="{{ route('courses.destroy',$course->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>



      </td>
    </tr>
      @endforeach


  </tbody>
</table>
    </div>
@endsection
