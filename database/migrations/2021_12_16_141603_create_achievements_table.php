<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable()->default(0);
            $table->string('award_name')->nullable();
            $table->string('title');
            $table->date('issue_date')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('achievements');
    }
}
