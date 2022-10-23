<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('website_link')->nullable();
            $table->text('content')->nullable();
            $table->string('video_path')->nullable();
            $table->boolean('is_video');
            $table->boolean('is_import_substitution')->default(false);
            $table->integer('verification_status')->default(0);
            $table->string('verification_comment')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('projects');
    }
}
