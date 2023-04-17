@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="ml-6 mr-6 mt-6 ">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="product_name" class="text-green-500 font-medium">{{ __('Product Name') }}</label>
                <div class="col-md-6">
                    <input id="product_name" type="text" class="rounded-md border-blue-500 border-2 p-2 w-full"name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>
                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="product_color" class="text-green-500 font-medium">{{ __('Product Color') }}</label>
                <div class="col-md-6">
                    <input id="product_color" type="text" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_color" value="{{ old('product_color') }}" required autocomplete="product_color">
                    @error('product_color')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="product_model" class="text-green-500 font-medium">{{ __('Product Model') }}</label>
                <div class="col-md-6">
                    <input id="product_model" type="text" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_model" value="{{ old('product_model') }}" required autocomplete="product_model">
                    @error('product_model')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_company" class="text-green-500 font-medium">{{ __('Product Company') }}</label>
                <div class="col-md-6">
                    <select id="product_company" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_company" required>
                        <option value="">Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->company_id }}" {{ old('product_company') == $company->company_id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                    @error('product_company')
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_image" class="text-green-500 font-medium">{{ __('Product Image') }}</label>
                <div class="col-md-6">
                    <input id="product_image" type="string" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_image" value="{{ old('product_image') }}" autocomplete="product_image">
                    @error('product_image')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_start_price" class="text-green-500 font-medium">{{ __('Product Start Price') }}</label>
                <div class="col-md-6">
                    <input id="product_start_price" type="number" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_start_price" value="{{ old('product_start_price') }}" required autocomplete="product_start_price" step="0.01">
                    @error('product_start_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_currency_price" class="text-green-500 font-medium">{{ __('Product Currency Price') }}</label>
                <div class="col-md-6">
                    <input id="product_currency_price" type="text" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_currency_price" value="{{ old('product_currency_price') }}" required autocomplete="product_currency_price">
                    @error('product_currency_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_current_price" class="text-green-500 font-medium">{{ __('Product Current Price') }}</label>
                <div class="col-md-6">
                    <input id="product_current_price" type="number" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_current_price" value="{{ old('product_current_price') }}" autocomplete="product_current_price" step="0.01">
                    @error('product_current_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_year_of_production" class="text-green-500 font-medium">{{ __('Product Year of Production') }}</label>
                <div class="col-md-6">
                    <input id="product_year_of_production" type="number" class="rounded-md border-blue-500 border-2 p-2 w-full" name="product_year_of_production" value="{{ old('product_year_of_production') }}" required autocomplete="product_year_of_production">
                    @error('product_year_of_production')
                    <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
                          </span>
                    @enderror
                </div>
            </div>

            <br>

            <button type="submit" class="bg-green-500 text-white rounded-md px-4 py-2 mt-2 hover:bg-green-600 focus:bg-green-600">Add Product</button>
        </form>


        <table class="w-full border-collapse mt-6">
            <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_id</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_name</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_image</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_color</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_company</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_model</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_start_price</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_currency_price</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_current_price</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Product_year_of_production</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $prods)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_id }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_name }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_image }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_color }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_company }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_model }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_start_price }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_currency_price }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_current_price}}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $prods->product_year_of_production }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links('pagination::tailwind') }}

    </div>
@endsection
