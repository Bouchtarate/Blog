<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    if (Auth::user()->type === "user") {
      $users = User::where('id', Auth::user()->id)->first();
      $path = '';
    } else {
      $users = User::all();
      $path = 'Admin';
    }
    return view(
      "profile/index$path",
      [
        'users' => $users,
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $id = Auth::user()->id;
    return view(
      'profile/edit',
      [
        'user' => User::where('id', $id)->first(),
      ]
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'phone' => 'required|min:10|max:25'
    ]);

    User::where('id', $id)->update([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
    ]);
    return redirect('/profile');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $user = User::where('id', $id);
    $user->delete();
    return redirect('/profile');
  }
}