@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header fw-bold">{{ __('Create Post') }}</div>
        <div class="card-body">
          @if ($errors->any())
            <div class="btn btn-danger text.light px-4">
              @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
                @endforeach
            </div>
          @endif
          <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control"name="title" >
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                          <div class="col-md-6">
                            <textarea name="description" class="form-control" cols="10" rows="5"></textarea>
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
                      <div class="row mb-3">
                          <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>
                          <div class="col-md-6">
                            <input type="file" name="image">
                          </div>
                      </div>
                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-success fw-bold w-50 mx-4">
                                  {{ __('Create Post') }}
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
