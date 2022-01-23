<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_head_id');
            $table->unsignedBigInteger('parent_id')->nullable()->default(0);
            $table->string('name');
            $table->string('slug')->unique();
            $table->tinyInteger('status')->default(1);
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->foreign('category_head_id')
                ->references('id')
                ->on('category_heads');
            // $table->foreign('parent_id')
            // ->references('id')
            // ->on('categories');
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
        Schema::dropIfExists('categories');
    }
}
