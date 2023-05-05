@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection
@section('head_script')
@endsection
@section('content')
    <div class="w-full overflow-x-auto">
        <h1 class="text-3xl font-bold mb-4">Ended Auctions</h1>
        <table class="w-full table-auto">
            <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Auction ID</th>
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Winner</th>
                <th class="px-4 py-2">Winner e-mail</th>
                <th class="px-4 py-2">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($auctions as $auction)
                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                    <td class="border px-4 py-2">{{ $auction->auction_id }}</td>
                    <td class="border px-4 py-2">{{ $auction->product->product_name }}</td>
                    <td class="border px-4 py-2">{{ $auction->highest_bid_user->name}}</td>
                    <td class="border px-4 py-2">{{ $auction->highest_bid_user->email}}</td>
                    <td class="border px-4 py-2">{{ $auction->highest_bid_user->bid_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
