@extends('admin.app')


@section('content')

    <div class="container">
    <div class="d-flex justify-content-between mb-3">
     <h6><b>Categories</b></h6>
     <a class="btn btn-primary" href="{{ route('cats.create') }}"> Add New</a>
     </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      @foreach ($cats as $c)
      <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{$c->name}}</td>
      <td>
      <form action="{{ route('cats.destroy',$c->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('cats.edit',$c->id) }}">Edit</a>
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
