@extends('admin.app')


@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Student \ View</b></h6>
     <div>
     <a class="btn btn-sm btn-info" href="{{ route('students.addCourse',$student_id) }}"> Add To Course</a>
     <a class="btn btn-sm btn-primary" href="{{ route('students.index') }}"> Back</a>
     </div>
     </div>
      @include('admin.inc.errors')



         <div class="row">
     <table class="table">
      <thead>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  @foreach ($course as $c)
      <tr>

      <th scope="row">{{ $loop->iteration }}</th>

      <td>{{$c->name}}</td>
      <td>{{$c->pivot->status}}</td>
      <td>
          @if($c->pivot->status !== 'approve')
     <a class="btn btn-info" href="{{ route('students.approveCourse',[$student_id,$c->id]) }}">Approve</a>
          @endif
          @if($c->pivot->status !== 'reject' )
     <a class="btn btn-danger" href="{{ route('students.rejectCourse',[$student_id,$c->id]) }}">Reject</a>
     @endif
      </td>
      </tr>
      @endforeach
       </tbody>
      </table>

		</div>
    </div>

    @endsection
