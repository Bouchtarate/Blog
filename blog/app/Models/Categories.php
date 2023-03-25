<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
  use HasFactory;
  use Sluggable;

  protected $fillable = [
    'id',
    'title',
    'slug',
  ];
  public function posts()
  {
    return $this->hasMany(Post::class, 'category_id', 'id');
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