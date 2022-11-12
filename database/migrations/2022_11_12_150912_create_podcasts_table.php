<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('podcasts', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->string('slug');
      $table->string('image')->default('default.png');
      $table->string('content_resource');
      $table->string('duration');
      $table->text('description');
      $table->char('block', 3)->default('no');
      $table->char('explicit', 3)->default('no');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('podcasts');
  }
};
