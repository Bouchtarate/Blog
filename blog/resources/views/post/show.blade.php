@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="text-center">
      <h1 class="pt-3 text-primary">
        {{$post->user->name}}  Blog</h1>
      <p class="py-3 text-dark text-opacity-75 fs-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae iste mollitia ratione animi. Error, sit.</p>
    </div>
      <div class="card m-auto" style="width:40%;">
        <img src="{{asset('images/'.$post->image_path)}}" class="card-img-top img-fluid img-thumbnail" alt="{{$post->image_path}}">
        <div class="card-body m-3">
            <h5 class="card-title text-dark text-opacity-75">{{date('jS M Y', strtotime($post->created_at))}}</h5>
          <h3 class="card-title">{{$post->title}}</h3>
          <p class="card-text">{{$post->description}}</p>
          <h5 class="card-title text-dark text-opacity-75 fw-bold text-center pt-3"><a href="/categories/{{$post->category->slug}}" class="nav-link">{{$post->category->title}}</a></h5>
        </div>
      </div>
      <table class="table table-bordered mt-5">
        <thead class="table-success">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Comment</th>
            <th scope="col">Date</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        @foreach ($comments as $comment)
        <tbody>
          <tr>
              <td>{{$comment->user->name}}</td>
              <td>{{$comment->content}}</td>
              <td>{{date('jS M Y', strtotime($comment->created_at))}}</td>
              <td>
                <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                  @csrf
                  @method('delete')
                  @if ($comment->user_id !== Auth::user()->id)
                  <button class="btn text light" style="cursor: not-llowed" disabled>Delete</button>
                  @else
                  <button type="submit" class="btn btn-danger">Delete</button>
                  @endif
                </form>
              </td>
          </tr>
        </tbody>
        @endforeach
      </table>
      <form action="{{route('comment.store')}}" method="POST">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @if (session()->has('success'))
          <div class="alert alert-success">
            {{session()->get('success')}}
          </div>
        @endif
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Add your comment"  name="content">
          <input type="hidden" name="post_id" value="{{$post->id}}">
          <button class="input-group-text btn btn-success" type="submit">Create Comment</button>
        </div>
      </form>
  </div>
@endsection
