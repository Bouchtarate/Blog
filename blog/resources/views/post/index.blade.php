@extends('layouts.app')
@section('content')
<div class="container">
  <div class="text-center">
    <h1 class="py-3 text-primary">{{ Auth::user()->name }} Posts</h1>
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
    @endif
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
            <div class="d-flex justify-content-between align-items-center">
              <a href="/post/{{$post->slug}}/edit" class="btn btn-warning text-light mx-2">Edit Post</a>
              <form action="{{route('post.destroy',$post->slug)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mx-2">Delete Post</button>
              </form>
              <a href="/post/{{$post->slug}}" class="btn btn-primary mx-2">Read More</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center p-5">
      <a href="/post/create" class="btn btn-success text-light fw-bold btn-lg d-flex mx-5"><span class="mx-2 pl-2">Create Post</span><svg class="bi bi-chevron-right fw-bold" width="30" height="30" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
      </a>
    </div>
  </div>
</div>
@endsection
