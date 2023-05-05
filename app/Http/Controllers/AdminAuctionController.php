<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class AdminAuctionController extends Controller
{
    public function index()
    {
        $auctions = Auction::where('date_end', '<=', now())->with('product', 'bids.user')->get();

        return view('admin.auctions.index', compact('auctions'));
    }
}
