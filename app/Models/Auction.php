<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\UuidCast;

class Auction extends Model
{
    protected $table = 'auctions';


    protected $fillable = [
        'product_id',
        'date_start',
        'date_end',
        'minimal_biding_price',
        'auction_id'
    ];
    protected $primaryKey = 'auction_id';

    public function getCastType($key)
    {
        if ($key === 'auction_id') {
            return 'string'; // Set the correct data type for auction_id
        }

        return parent::getCastType($key);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
    public function bids()
    {
        return $this->hasMany(Bids::class, 'auction_id');
    }

    public function getHighestBidAttribute()
    {
        $currentHighestBid = $this->bids->max('bid_price');
        return $currentHighestBid ?? $this->starting_price;
    }
}
