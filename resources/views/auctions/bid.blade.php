@extends('layouts.app')

@section('title', 'Place Bid')

@section('content')
    @if($message = Session::get('success'))
        <div id="alertBidSuccess" class="fixed top-16 left-0 w-full bg-green-300 rounded-b-md shadow-lg">
            <div class="flex items-center px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white mr-2">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-2.625 6c-.54 0-.828.419-.936.634a1.96 1.96 0 00-.189.866c0 .298.059.605.189.866.108.215.395.634.936.634.54 0 .828-.419.936-.634.13-.26.189-.568.189-.866 0-.298-.059-.605-.189-.866-.108-.215-.395-.634-.936-.634zm4.314.634c.108-.215.395-.634.936-.634.54 0 .828.419.936.634.13.26.189.568.189.866 0 .298-.059.605-.189.866-.108.215-.395.634-.936.634-.54 0-.828-.419-.936-.634a1.96 1.96 0 01-.189-.866c0-.298.059-.605.189-.866zm2.023 6.828a.75.75 0 10-1.06-1.06 3.75 3.75 0 01-5.304 0 .75.75 0 00-1.06 1.06 5.25 5.25 0 007.424 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-white">{{$message}}</span>
            </div>
            <div id="progress-bar" class="h-2 bg-white"></div>
        </div>
    @endif
    @if($message = Session::get('error'))
        <div id="alertBidError" class="fixed top-16 left-0 w-full bg-red-300 rounded-b-md shadow-lg">
            <div class="flex items-center px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>

                <span class="text-white">{{$message}}</span>
        </div>
        <div id="progress-bar" class="h-2 bg-white"></div>
        </div>
    @endif
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
            <br />  <span class="text-2xl">Prod. name: </span> <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"><img src="{{ $auction->product->product_image }}"></td>
        </div>

    </div>

@endsection
