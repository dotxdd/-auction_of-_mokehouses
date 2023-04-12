<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('product_id')->primary();
            $table->string('product_name', 100);
            $table->string('product_image', 50)->nullable();
            $table->string('product_color', 30);
            $table->unsignedBigInteger('product_company');
            $table->string('product_model', 50);
            $table->decimal('product_start_price', 8, 2);
            $table->string('product_currency_price', 4);
            $table->decimal('product_current_price', 8, 2)->nullable();
            $table->integer('product_year_of_production');
            $table->timestamps();

            $table->foreign('product_company')->references('company_id')->on('product_companies');
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
            $table->dropForeign(['product_company']);
        });

        Schema::dropIfExists('products');
    }
}
