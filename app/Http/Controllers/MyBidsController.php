<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Bids;
class MyBidsController
{
public function index(){
    $user_id = Auth::id();
    $myBids = Bids::where('user_id', $user_id)->with('product')->get();

    return view('auctions.my_bids', ['myBids' => $myBids]);
}

}
