<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class postsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('post.index', [
      'posts' => Post::where('user_id', Auth::user()->id)->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */

  public function create()
  {
    return view('post/create', [
      'categories' => Categories::all()
    ]);
  }
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required',
      'image' => 'required|mimes:jpg,png,jpeg|max:5048',
      'category' => 'required',
    ]);
    $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

    $request->image->move(public_path('images'), $newImageName);

    Post::create([
      'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
      'user_id' => auth()->user()->id,
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'image_path' => $newImageName,
      'category_id' => $request->input('category'),
    ]);
    return redirect('/post')
      ->with('message', 'Your update has been applied successfully');
  }
  /**
   * Display the specified resource.
   */
  public function show(string $slug)
  {
    $post = Post::with('comments')->where('slug', $slug)->first();

    return view('post.show', [
      'post' => $post,
      'comments' => $post->comments
    ]);
    // return view('post.show')->with('post', Post::where('slug', $slug)->first());
  }
  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $slug)
  {
    return view('post.edit', [
      'post' => Post::where('slug', $slug)->first(),
      'categories' => Categories::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $slug)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required',
      'category' => 'required',
    ]);
    Post::where('slug', $slug)->update([
      'user_id' => auth()->user()->id,
      'title' => $request->input('title'),
      'description' => $request->input('description'),
      'category_id' => $request->input('category'),
      'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
    ]);
    return redirect('/post')
      ->with('message', 'Your update has been applied successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $slug)
  {
    $post = Post::where('slug', $slug);
    $post->delete();
    return redirect('/post');

  }
}