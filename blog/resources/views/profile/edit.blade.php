@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header fw-bold">{{ __($user->name .' Profile') }}</div>
        <form action="/profile/{{$user->id}}" method="post">
        <div class="card-body">
            <div class="row mb-3">
                @csrf
                @method('PUT')
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
              <div class="col-md-6">
                  <input id="email" type="email" class="form-control"name="email" value="{{$user->email}}">
              </div>
            </div>
            <div class="row mb-3">
              <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
              <div class="col-md-6">
                  <input id="phone" type="text" class="form-control" name="phone" value="{{$user->phone}}" >
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center my-3">
              <a href="/profile">
                <button type="submit" class="btn btn-dark text-light mt-3 mx-3 fw-bold edit">Save Profile
                </button>
              </a>
            </div>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>
@endsection
