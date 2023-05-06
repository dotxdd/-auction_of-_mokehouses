<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Bids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminAuctionController extends Controller
{
    public function index()
    {
        $product=DB::table('products')
            ->select('product_id', 'product_name')
            ->get();
        $highestBidUsers = DB::table('bids')
            ->select('bid_id', 'auction_id', 'bids.user_id', 'bid_price', 'name', 'email')
            ->orderBy('bid_price', 'desc')
            ->limit(1)
            ->join('users', 'users.id', '=', 'bids.user_id')
            ->get();



        $auctions = DB::table('auctions')
            ->where('date_end', '<=', now())
            ->get();
        foreach ($auctions as $auction) {
            $auction->highest_bid_user = $highestBidUsers->firstWhere('auction_id', $auction->auction_id);
            $auction->product = $product->firstWhere('product_id', $auction->product_id);
        }

        return view('admin.auctions.index', compact('auctions'));
    }
}
