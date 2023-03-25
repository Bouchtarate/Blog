@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header fw-bold">{{ __('Edit Post') }}</div>
        <div class="card-body">
          <form method="POST" action="{{route('post.update',$post->slug)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control"name="title" value="{{$post->title}}">
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                          <div class="col-md-6">
                            <textarea name="description" class="form-control" cols="10" rows="5">{{$post->description}}</textarea>
                          </div>
                      </div>
                      <div class="input-group mb-4 w-50 mx-auto px-5">
                        <div class="btn btn-outline-secondary">Categories</div>
                        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="category">
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success fw-bold w-50 mx-4">
                                  {{ __('Edit Post') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

