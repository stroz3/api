<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->integer('eval')->nullable();
            $table->string('author_name');
            $table->string('author_company');
            $table->string('img_path')->nullable();
            $table->integer('verification_status')->default(0);
            $table->string('verification_comment')->nullable();
            $table->foreignId('exponent_id')->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
