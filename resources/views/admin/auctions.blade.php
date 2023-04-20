@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection
@section('head_script')
    <script>
        $(document).ready(function() {
            $('#date_start, #date_end').change(function() {
                var start = new Date($('#date_start').val());
                var end = new Date($('#date_end').val());

                if (end < start) {
                    alert('Auction end date cannot be before start date.');
                    $('#date_end').val($('#date_start').val());
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="ml-6 mr-6 mt-6">
        <form method="POST" action="{{ route('admin.auctions.store') }}">
            @csrf
            <label for="product_id" class="text-green-500 font-medium">{{ __('Product name') }}</label>
            <div class="col-md-6">
                <select id="product_id" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_id" required>
                    <option value="">Select Product</option>
                    @foreach ($product as $prod)
                        <option value="{{ $prod->product_id }}" {{ old('product_id') == $prod->product_id ? 'selected' : '' }}>{{ $prod->product_name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <label for="date_start" class="text-green-500 font-medium">{{ __('Auction Start Date') }}</label>
            <div class="col-md-6">
                <input id="date_start" type="datetime-local" class="rounded-md border-blue-500 border-2 p-2 w-full" name="date_start" value="{{ old('date_start') }}" required>
                @error('date_start')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <label for="date_end" class="text-green-500 font-medium">{{ __('Auction End Date') }}</label>
            <div class="col-md-6">
                <input id="date_end" type="datetime-local" class="rounded-md border-blue-500 border-2 p-2 w-full" name="date_end" value="{{ old('date_end') }}" required>
                @error('date_end')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <label for="minimal_biding_price" class="text-green-500 font-medium">{{ __('Minimal Bidding Price') }}</label>
            <div class="col-md-6">
                <input id="minimal_biding_price" type="number" step="0.01" class="rounded-md border-blue-500 border-2 p-2 w-full" name="minimal_biding_price" value="{{ old('minimal_biding_price') }}" required>
                @error('minimal_biding_price')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror
            </div>

            <div class="col-md-6 offset-md-4 mt-4">
                <button type="submit" class="rounded-md bg-blue-500 text-white p-2">{{ __('Create Auction') }}</button>
            </div>
        </form>
        <table class="w-full border-collapse mt-6">
            <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Auction id</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_id</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">date_start</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">date_end</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">minimal_biding_price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($auctions as $auct)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auct->auction_id }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auct->product_id }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auct->date_start }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auct->date_end }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $auct->minimal_biding_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $auctions->links('pagination::tailwind') }}
    </div>
@endsection
