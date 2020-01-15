<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Posts extends Migration {
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
   // blog table
  Schema::create('posts', function(Blueprint $table)
  {
    $table->bigIncrements('id');
    $table->unsignedBigInteger('user_id') -> default(0);
    $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
    $table->string('title')->unique();
    $table->text('body');
    $table->string('slug')->unique();
    $table->boolean('active');
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
   // drop blog table
   Schema::drop('posts');
 }
}
