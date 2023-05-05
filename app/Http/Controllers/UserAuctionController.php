<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class UserAuctionController extends Controller
{
    public function index()
    {
        $auctions = Auction::whereHas('bids', function ($query) {
            $query->where('user_id', auth()->id());
        })->where('date_end', '<=', now())->with('product', 'bids.user')->get();

        return view('users.auctions.index', compact('auctions'));
    }
}
