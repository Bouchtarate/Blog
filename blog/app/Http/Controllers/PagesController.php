<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PagesController extends Controller
{
  public function index()
  {
    return view('index', [
      'posts' => Post::orderBy('created_at', 'DESC')->get(),
    ]);
  }
}