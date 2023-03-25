@extends('layouts.app')
@section('content')
<form action="/categories" method="POST">
  @csrf
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Add your Category" name="title">
    <button class="input-group-text btn btn-success" type="submit">Create Category</button>
  </div>
</form>
<form action="/categories" method="POST">
  @csrf
  @method("delete")
  <div class="input-group mb-3">
    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="category">
      @foreach ($categories as $category)
      <option value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
    <button class="input-group-text btn btn-danger" type="submit">Delete Category</button>
  </div>
</form>
@endsection
