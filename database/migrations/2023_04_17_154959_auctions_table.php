<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->uuid('auction_id');
            $table->unique('auction_id');
            $table->uuid('product_id')->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->decimal('minimal_biding_price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
