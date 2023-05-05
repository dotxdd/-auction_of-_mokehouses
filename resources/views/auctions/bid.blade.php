@extends('layouts.app')

@section('title', 'Place Bid')

@section('content')

    <div class="flex justify-center mt-10">

        <div class="w-full sm:w-3/4 md:w-1/2 lg:w-1/3">

            <h1 class="text-3xl font-bold text-center mb-6">Place Bid</h1>

            <form action="{{ route('auctions.placeBid', ['auctionId' => $auction->auction_id]) }}" method="POST" class="border border-gray-400 p-6 rounded-lg">

                @csrf

                <div class="mb-4">
                    <label for="bid_price" class="block text-gray-700 font-bold mb-2">Bid Price:</label>
                    <input type="number" step="0.01" name="bid_price" id="bid_price" class="form-input w-full @error('bid_price') border-red-500 @enderror" value="{{ old('bid_price') }}" required>
                    @error('bid_price')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Place Bid
                </button>

            </form>
            <span class="text-2xl">Min. bid: </span><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auction->minimal_biding_price }} EUR</td><br />
            <span class="text-2xl">Min. bid in polish zloty: </span><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ number_format(($auction->minimal_biding_price *$exchange),2)}} PLN</td>
          <br />  <span class="text-2xl">Current offer: </span><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $price}} EUR</td>
          <br />  <span class="text-2xl">Current offer in polish zloty: </span><td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{number_format(($exchange*$price),2)}} PLN </td>
          <br />  <span class="text-2xl">Prod. name: </span> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auction->product->product_name }}</td>
            <br />
        </div>

    </div>

@endsection
