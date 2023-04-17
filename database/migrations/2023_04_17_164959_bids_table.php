<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id('bid_id');
            $table->unsignedBigInteger('auction_id');
            $table->foreign('auction_id')->references('auction_id')->on('auctions')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('bid_price', 10, 2);
            $table->dateTime('date_of_bid');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
