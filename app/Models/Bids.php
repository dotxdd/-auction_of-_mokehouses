<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\UuidCast;

class Bids extends Model
{
    protected $table = 'bids';
    protected $primaryKey = 'bid_id';
    protected $fillable = [
        'auction_id',
        'user_id',
        'bid_price',
        'date_of_bid'
    ];
    public function getCastType($key)
    {
        if ($key === 'auction_id') {
            return 'string'; // Set the correct data type for auction_id
        }

        return parent::getCastType($key);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
