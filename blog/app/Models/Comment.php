<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'user_id',
    'post_id',
    'content',
    'created_at',
  ];

  public static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
      if (auth()->check()) {
        $model->user_id = auth()->user()->id;
      }
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
}