@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="ml-6 mr-6 mt-6">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div class="form-group row">
                <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
                <div class="col-md-6">
                    <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>
                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="product_color" class="col-md-4 col-form-label text-md-right">{{ __('Product Color') }}</label>
                <div class="col-md-6">
                    <input id="product_color" type="text" class="form-control @error('product_color') is-invalid @enderror" name="product_color" value="{{ old('product_color') }}" required autocomplete="product_color">
                    @error('product_color')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="product_model" class="col-md-4 col-form-label text-md-right">{{ __('Product Model') }}</label>
                <div class="col-md-6">
                    <input id="product_model" type="text" class="form-control @error('product_model') is-invalid @enderror" name="product_model" value="{{ old('product_model') }}" required autocomplete="product_model">
                    @error('product_model')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_company" class="col-md-4 col-form-label text-md-right">{{ __('Product Company') }}</label>
                <div class="col-md-6">
                    <select id="product_company" class="form-control @error('product_company') is-invalid @enderror" name="product_company" required>
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
                <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>
                <div class="col-md-6">
                    <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" value="{{ old('product_image') }}" autocomplete="product_image">
                    @error('product_image')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_start_price" class="col-md-4 col-form-label text-md-right">{{ __('Product Start Price') }}</label>
                <div class="col-md-6">
                    <input id="product_start_price" type="number" class="form-control @error('product_start_price') is-invalid @enderror" name="product_start_price" value="{{ old('product_start_price') }}" required autocomplete="product_start_price" step="0.01">
                    @error('product_start_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_currency_price" class="col-md-4 col-form-label text-md-right">{{ __('Product Currency Price') }}</label>
                <div class="col-md-6">
                    <input id="product_currency_price" type="text" class="form-control @error('product_currency_price') is-invalid @enderror" name="product_currency_price" value="{{ old('product_currency_price') }}" required autocomplete="product_currency_price">
                    @error('product_currency_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_current_price" class="col-md-4 col-form-label text-md-right">{{ __('Product Current Price') }}</label>
                <div class="col-md-6">
                    <input id="product_current_price" type="number" class="form-control @error('product_current_price') is-invalid @enderror" name="product_current_price" value="{{ old('product_current_price') }}" autocomplete="product_current_price" step="0.01">
                    @error('product_current_price')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="product_year_of_production" class="col-md-4 col-form-label text-md-right">{{ __('Product Year of Production') }}</label>
                <div class="col-md-6">
                    <input id="product_year_of_production" type="number" class="form-control @error('product_year_of_production') is-invalid @enderror" name="product_year_of_production" value="{{ old('product_year_of_production') }}" required autocomplete="product_year_of_production">
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


    </div>
@endsection
