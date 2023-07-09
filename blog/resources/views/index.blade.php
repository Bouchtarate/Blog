@extends('layouts.app')
@section('content')
<div class="">
  <div class="container">
    <div class="text-center">
      <h1 class="pt-3 text-primary">Open Blogs</h1>
      <p class="py-3 text-dark text-opacity-75 fs-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae iste mollitia ratione animi. Error, sit.</p>
    </div>
    @foreach ($posts as $post)
    <div class="card mb-3">
      <div class="row g-0 p-2 align-items-center">
        <div class="col-md-4">
          <img src="{{asset("images/".$post->image_path)}}" class="img-fluid rounded w-75" alt="{{$post->image_path}}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center pb-3">
              <h4 class="card-title my-0">{{$post->title}}</h4>
              <h5 class="card-title my-0 mx-2 text-dark text-opacity-50">
                by
                <span class="text-primary">{{$post->user->name}}</span>
                {{date('jS M Y', strtotime($post->created_at))}}
              </h5>
            </div>
            <p class="card-text text-dark text-opacity-50">{{$post->description}}</p>
            <div class="d-flex align-items-center justify-content-between pt-3">
              <a class="card-text nav-link m-0 fw-bold"
              @if (!Auth::user())
              href="/login"
              @endif
              href="categories/{{$post->category->slug}}"
              ><small class="text-muted">{{$post->category->title}}</small></a>
              <a
              @guest
                href="/login"
              @endguest
                href="post/{{$post->slug}}"
              class="btn btn-primary mx-2">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">

      @if (!Auth::user())
      <a href="/login"
      class="btn btn-dark text-light fw-bold btn-lg d-flex"><span class="mx-2 pl-2">Lead More</span><svg class="bi bi-chevron-right fw-bold" width="30" height="30" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
      </a>
      @endif

    </div>
  </div>
</div>
@endsection
