@extends('dashboard.index')

@section('title')
    create genre
@endsection

@section('content')
<form action="{{ route('genre.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="nama">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
