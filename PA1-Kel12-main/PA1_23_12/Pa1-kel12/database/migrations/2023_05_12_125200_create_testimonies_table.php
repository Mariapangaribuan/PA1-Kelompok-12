<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonies', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();

            $table->text('description');
            $table->tinyInteger('status')->default(1);
            // $table->foreignId('destination_id')->nullable()->constrained('destinations');
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->foreign('destination_id')->references('id')->on('destinations');
            
            // $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens');
            $table->unsignedBigInteger('kabupaten_id')->nullable();
            $table->foreign('kabupaten_id')->references('id')->on('kabupatens');

            // $table->foreignId('contributor_id')->constrained('contributors');
            $table->unsignedBigInteger('contributor_id')->nullable();
            $table->foreign('contributor_id')->references('id')->on('contributors');

            // $table->foreignId('blog_id')->nullable()->constrained('blogs');
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs');

            // $table->foreignId('restaurant_id')->constrained('restaurants');
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

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
        Schema::dropIfExists('testimonies');
    }
}
