<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exponents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_desc');
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('full_desc');
            $table->string('logo_path');
            $table->string('main_img_path');
            $table->string('website_link');
            $table->jsonb('contacts')->nullable();
            $table->string('inn', 12)->unique();
            $table->string('kpp', 9)->nullable();
            $table->string('ogrn', 13)->unique()->nullable();
            $table->string('business_address')->nullable();
            $table->string('production_address')->nullable();
            $table->boolean('is_import_substitution')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('verification_status')->default(0);
            $table->string('verification_comment')->nullable();
            $table->foreignId('sector_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('exponents');
    }
}
