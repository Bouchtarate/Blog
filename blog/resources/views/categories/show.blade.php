@extends('layouts.app')
@section('content')
<div class="container">
  <div class="text-center">
    <h1 class="py-3 text-primary">{{ $category->title }} Posts</h1>
    <div class="row pt-3">
      @foreach ($posts as $post)
      <div class="col-12 col-sm-6 col-md-4 mb-3">
        <div class="card">
          <img src="{{asset('images/'.$post->image_path)}}" class="img-fluid rounded p-2" alt="{{$post->image_path}}">
          <div class="card-body">
            <h6 class="card-title mx-2 text-dark text-opacity-50">by
              <span class="fw-bold text-dark text-opacity-100">{{ Auth::user()->name }}
              </span> , On
                {{date('jS M Y', strtotime($post->created_at))}}
            </h6>
            <h4 class="card-title mx-2">{{$post->title}}</h4>
            <p class="card-text text-dark text-opacity-50">{{$post->description}}</p>
            <p class="my-3 fw-bold text-muted card-text">
              @if ($post->category_id === $post->category->id)
                {{$post->category->title}}
              @endif
            </p>
            <div class="">
              <a href="/post/{{$post->slug}}" class="btn btn-primary mx-2">Read More</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
