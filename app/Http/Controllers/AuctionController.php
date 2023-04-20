<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\ProductCompany;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AuctionController extends Controller
{
    public function index()
    {
        $auctions = Auction::paginate(10);
        $product = Product::all();

//, compact('auctions'))->with('product', $product
        return view('admin.auctions', compact('auctions'))->with('product', $product);
    }

    public function create()
    {


    }

    public function store(Request $request)
    {
        $auction = new Auction();
        $auction->auction_id = Uuid::uuid4()->toString();
        $auction->product_id = $request->input('product_id');
        $auction->date_start = $request->input('date_start');
        $auction->date_end = $request->input('date_end');
        $auction->minimal_biding_price = $request->input('minimal_biding_price');
        $auction->save();

        return redirect()->route('admin.auctions');
    }

    public function edit(Auciton $auction)
    {
        $product = Product::all();
        return view('admin.edit-auction', compact('auction', 'product'));
    }

    public function update(Request $request, Auction $auction)
    {
        $auction->auction_id = Uuid::uuid4()->toString();
        $auction->product_id = $request->input('product_id');
        $auction->date_start = $request->input('date_start');
        $auction->date_end = $request->input('date_end');
        $auction->minimal_biding_price = $request->input('minimal_biding_price');
        $auction->save();

        return redirect()->route('admin.auction'); // use the same route name here
    }

    public function destroy(Auction $auction)
    {
        $auction->delete();

        return redirect()->route('admin.auction'); // use the same route name here
    }
}
