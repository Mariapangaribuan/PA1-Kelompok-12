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
            $table->id();
            $table->foreignId('blog_category_id')->constrained('blog_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnUpdate()->cascadeOnDelete()->default(1);
            $table->unsignedBigInteger('contributor_id')->nullable();
            $table->foreign('contributor_id')->references('id')->on('contributors');
            $table->string('slug')->unique();
            $table->string('title');
            $table->integer('is_share');
            $table->text('excerpt');
            $table->text('description');
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
