<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view(
      'categories/index',
      [
        'categories' => Categories::all(),
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('categories/index');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255'
    ]);
    Categories::create([
      'title' => $request->input('title'),
      'slug' => SlugService::createSlug(Categories::class, 'slug', $request->title),
    ]);
    return redirect('categories');
  }

  /**
   * Display the specified resource.
   */
  // public function show(string $id)
  // {
  //   return view(
  //     'categories.show',
  //     [
  //       "posts" => Post::where('category_id', $id)->get(),
  //       "category" => Categories::where('id', $id)->first()
  //     ]
  //   );
  // }

  public function show(string $slug)
  {
    $category = Categories::with('posts')->where('slug', $slug)->first();
    return view(
      'categories.show',
      [
        "posts" => $category->posts,
        "category" => $category,
      ]
    );
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}