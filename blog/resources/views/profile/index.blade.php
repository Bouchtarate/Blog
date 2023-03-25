@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header fw-bold">{{ __($users->name .' Profile') }}</div>
        <div class="card-body">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{$users->name}}" disabled>
                </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
              <div class="col-md-6">
                  <input id="email" type="email" class="form-control"name="email" value="{{$users->email}}" disabled>
              </div>
            </div>
            <div class="row mb-3">
              <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
              <div class="col-md-6">
                  <input id="phone" type="text" class="form-control" name="phone" value="{{$users->phone}}" disabled>
              </div>
            </div>
            <div class="d-flex justify-content-center align-items-center my-3">
              <a href="/profile/{{$users->id}}/edit">
                <button type="button" class="btn btn-warning text-light mx-3 mt-3 fw-bold edit">Edit Profile
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
