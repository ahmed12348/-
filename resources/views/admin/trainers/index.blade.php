@extends('admin.app')


@section('content')

    <div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Trainers</b></h6>
     <a class="btn btn-primary"  href="{{ route('trainers.create') }}"> Add New</a>
     </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">phone</th>
      <th scope="col">Specialize</th>

      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($trainers as $trainer)
      <tr>

      <th scope="row">{{ $loop->iteration }}</th>
      <td> <img src="{{asset('uploads/trainers/'.$trainer->img)}}"  width="50px" alt=""></td>
      <td>{{$trainer->name}}</td>

      <td>
          @if($trainer->phone !== null)
          {{$trainer->phone}}
          @else Not Exist @endif
        </td>
      <td>{{$trainer->spec}}</td>

      <td>
      <form action="{{ route('trainers.destroy',$trainer->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('trainers.edit',$trainer->id) }}">Edit</a>
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
