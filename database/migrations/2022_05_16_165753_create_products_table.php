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
            $table->String('title');
            $table->String('description');
            $table->String('category');
            $table->foreign('category')->references('category')->on('product_categories');
            $table->double('cost');
            $table->json('images')->nullable();
            $table->integer('max_borrow_days');
            // Nullable weghalen wanneer er account zijn
            $table->integer('owner_id')->nullable();
            $table->String('status')->default('AVAILABLE');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_foreign');
        });
        Schema::dropIfExists('products');
    }
}
