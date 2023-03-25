@extends('layouts.app')
@section('content')
<form action="/categories" method="POST">
  @csrf
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Add your Category" name="title">
    <button class="input-group-text btn btn-success" type="submit">Create Category</button>
  </div>
</form>
@foreach ($categories as $category)
<form action="{{route('categories.update',$category->slug)}}" method="POST">
  @endforeach
  @csrf
  @method("PUT")
  <div class="input-group mb-3">
    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" >
      @foreach ($categories as $category)
      <option value="{{$category->title}}">{{$category->title}}</option>
      @endforeach
    </select>
    <input type="text"name="title">
    <button class="input-group-text btn btn-primary opacity-50" type="submit">Modify  Category</button>
  </div>
</form>
@foreach ($categories as $category)
<form action="{{route('categories.destroy',$category->slug)}}" method="POST">
@endforeach
  @csrf
  @method("delete")
  <div class="input-group mb-3">
    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="category">
      @foreach ($categories as $category)
      <option value="{{$category->title}}">{{$category->title}}</option>
      @endforeach
    </select>
    <button class="input-group-text btn btn-danger" type="submit">Delete Category</button>
  </div>
</form>
@endsection
