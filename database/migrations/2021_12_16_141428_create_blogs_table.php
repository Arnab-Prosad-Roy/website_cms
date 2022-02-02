<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable()->default(0);
            $table->string('title');
            $table->string('slug',300)->unique()->nullable();
            
            $table->string('excerpt')->nullable();
            
            $table->longText('description')->nullable();

            $table->string('image')->nullable();
          
            $table->tinyInteger('status')->default(1);

            $table->string('authors')->nullable();
          
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_tags')->nullable();

            $table->string('og_meta_title')->nullable();
            $table->string('og_meta_description')->nullable();
            $table->string('og_meta_image')->nullable();
            $table->string('og_meta_tags')->nullable();
            
            $table->foreign('user_id')
                        ->references('id')->on('users');
            $table->foreign('category_id')
                        ->references('id')
                        ->on('categories');
      
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
        Schema::dropIfExists('blogs');
    }
}
