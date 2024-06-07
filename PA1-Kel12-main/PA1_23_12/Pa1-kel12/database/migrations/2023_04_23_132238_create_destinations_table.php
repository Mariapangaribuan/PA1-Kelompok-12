<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('ticket');
            $table->string('location');
            $table->integer('is_share');
            $table->unsignedBigInteger('contributor_id')->nullable();
            $table->foreign('contributor_id')->references('id')->on('contributors');
            $table->foreignId('destination_category_id')->constrained('destination_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kabupaten_id')->constrained('kabupatens')->cascadeOnUpdate()->cascadeOnDelete()->default(1);
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
        Schema::dropIfExists('destinations');
    }
}
