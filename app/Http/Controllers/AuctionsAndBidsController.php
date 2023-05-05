<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bids;
use App\Providers\Services\ApiNBPService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AuctionsAndBidsController
{

    public function index()
    {
        $activeAuctions = Auction::with('product')
            ->where('date_start', '<',Carbon::now())
            ->where('date_end', '>', Carbon::now())
            ->get();

        return view('auctions.index', [
            'auctions' => $activeAuctions
        ]);
    }

    /**
     * Show the bid form for the specified auction.
     *
     * @param int $auctionId
     * @return Response
     */
    public function showBidForm($auction_id)
    {

        $auction = Auction::where('auction_id', $auction_id)->first();
        $highestBid = Bids::where('auction_id', $auction_id)->max('bid_price');
        $priceEuro = ApiNBPService::getEuroPln();


        return view('auctions.bid', [
            'auction' => $auction,
            'price' => $highestBid,
            'exchange' => $priceEuro
        ]);
    }

    public function placeBid(Request $request, $auction_id)
    {

        $user = Auth::user();
        $auction = Auction::where('auction_id', $auction_id)->first();
        $bidPrice = $request->input('bid_price');

        // Validate the bid price
        if ($bidPrice <= $auction->minimal_biding_price) {

            return back()->with('error', 'Your bid must be higher than the current highest bid.');
        }

        // Check if the user has already placed a bid for this auction
        if ($user->hasBidOnAuction($auction)) {
            return back()->with('error', 'You have already placed a bid on this auction.');
        }

        // Use a database transaction to ensure atomicity
        DB::beginTransaction();

        try {
            // Get the current highest bid for the auction

            $currentHighestBid = $auction->bids()->max('bid_price');


            // Check if the user's bid exceeds the current highest bid
            if ($bidPrice <= $currentHighestBid) {
                return back()->with('error', 'Your bid must be higher than the current highest bid.');
            }

            // Create a new bid for the user
            $bid = new Bids();
            $bid->user_id = $user->id;
            $bid->auction_id = $auction_id;
            $bid->bid_price = $bidPrice;
            $bid->date_of_bid = now();
            $bid->save();


            DB::commit();

            return back()->with('success', 'Your bid has been placed.');
        } catch (Exception $e) {
            DB::rollback();

            return back()->with('error', 'An error occurred while placing your bid.');
        }
    }

}
