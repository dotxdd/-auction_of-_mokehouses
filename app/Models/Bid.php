<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';
    protected $primaryKey = 'bid_id';
    protected $fillable = [
        'auction_id',
        'user_id',
        'bid_price',
        'date_of_bid'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
