@extends('layouts.app')

@section('title', 'Place Bid')

@section('content')

    @foreach($myBids as $bid)
        <div class="bg-white rounded-lg shadow-lg p-4 mb-4">
            <div class="font-bold text-lg">Bid ID: {{ $bid->bid_id }}</div>
            <div class="mt-2">Auction ID: {{ $bid->auction_id }}</div>
            <div class="mt-2">Date of Bid: {{ $bid->date_of_bid }}</div>
            <div class="mt-2">Bid Price: {{ $bid->bid_price }}</div>
        </div>
    @endforeach

@endsection
