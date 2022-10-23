<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('brand');
            $table->string('video_path')->nullable();
            $table->text('desc');
            $table->decimal('price')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('min_batch')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('delivery_method')->nullable();
            $table->boolean('in_bulk');
            $table->boolean('retail');
            $table->boolean('is_import_substitution')->default(false);
            $table->boolean('is_service');
            $table->integer('verification_status')->default(0);
            $table->string('verification_comment')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('exponent_id')->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_category_id')->nullable()->constrained()
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
        Schema::dropIfExists('products');
    }
}
