<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable()->default(0);
            
            $table->string('title');
            $table->string('slug',300)->unique()->nullable();
            $table->string('excerpt');
            $table->longText('description')->nullable();
            $table->string('image')->nullable();

            $table->date('event_date')->nullable();
            $table->string('event_time')->nullable();
            $table->string('event_venue')->nullable();
            $table->string('venue_location')->nullable();

            $table->string('organizer_name')->nullable();
            $table->string('organizer_email')->nullable();
            $table->string('organizer_phone')->nullable();
            $table->string('organizer_website')->nullable();

            $table->tinyInteger('event_end')->default(1)->comment('1 = Upcoming Event ; 2 = Past Event ');

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
        Schema::dropIfExists('events');
    }
}
