@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection
@section('head_script')
@endsection
@section('content')
    <div class="mx-24 w-full overflow-x-auto">
        <table class=" w-full table-auto">
            <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Auction ID</th>
                <th class="px-4 py-2">Product Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($filteredData as $auction)
                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                    <td class="border px-4 py-2">{{ $auction->auction_id }}</td>
                    <td class="border px-4 py-2">{{ $auction->product->product_name }}</td>
                    <td class="border px-4 py-2">{{ $auction->highest_bid_user->bid_price }}</td>
                    <td class="border px-4 py-2">
                        <button class="rounded-l bg-blue-500 text-white px-4 py-2 hover:bg-blue-700">Pay</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
