<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  use Sluggable;
  protected $fillable = [
    'id',
    'slug',
    'user_id',
    'category_id',
    'title',
    'description',
    'image_path'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function category()
  {
    return $this->belongsTo(Categories::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class, 'post_id', 'id');
  }
  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title',
      ]
    ];
  }
}