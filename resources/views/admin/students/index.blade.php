@extends('admin.app')


@section('content')

    <div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>students</b></h6>
     <a class="btn btn-primary"  href="{{ route('students.create') }}"> Add New</a>
     </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>

      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Spec</th>


      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($students as $student)
      <tr>

      <th scope="row">{{ $loop->iteration }}</th>

      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>
          @if($student->spec !== null)
          {{$student->spec}}
          @else Not Exist @endif
        </td>


      <td>
      <form action="{{ route('students.destroy',$student->id) }}" method="POST">


                    <a class="btn btn-info" href="{{ route('students.edit',$student->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-primary" href="{{ route('students.show',$student->id) }}">Show Courses</a>
                </form>



      </td>
    </tr>
      @endforeach


  </tbody>
</table>
    </div>
@endsection
