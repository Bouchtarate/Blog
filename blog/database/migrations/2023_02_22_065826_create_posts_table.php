<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string('slug');
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('category_id');
      $table->string('title');
      $table->longText('description');
      $table->string('image_path');
      $table->timestamp('created_at');
      $table->timestamp('updated_at')->nullable();
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
      $table->foreign('category_id')
        ->references('id')
        ->on('categories');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('posts');
  }
};