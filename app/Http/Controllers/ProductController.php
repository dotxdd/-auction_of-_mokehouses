<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCompany;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        $companies = ProductCompany::all();

        return view('admin.products', compact('products'))->with('companies', $companies);
    }


    public function store(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_id = Uuid::uuid4()->toString();
        $product->product_image = $request->input('product_image');
        $product->product_company = $request->input('product_company');
        $product->product_color = $request->input('product_color');
        $product->product_model = $request->input('product_model');
        $product->product_start_price = $request->input('product_start_price');
        $product->product_currency_price = $request->input('product_currency_price');
        $product->product_year_of_production = $request->input('product_year_of_production');
        $product->save(['product_name', 'product_id', 'product_image', 'product_color', 'product_model', 'product_start_price', 'product_currency_price', 'product_year_of_production']);

        return redirect()->route('admin.products');
    }

    public function edit(Product $product)
    {
        $companies = ProductCompany::all();
        return view('admin.edit-product', compact('product', 'companies'));
    }

    public function update(Request $request, Product $product)
    {
        $product->product_name = $request->input('product_name');
        $product->product_image = $request->input('product_image');
        $product->product_company = $request->input('product_company');
        $product->product_color = $request->input('product_color');
        $product->product_model = $request->input('product_model');
        $product->product_start_price = $request->input('product_start_price');
        $product->product_currency_price = $request->input('product_currency_price');
        $product->product_year_of_production = $request->input('product_year_of_production');
        $product->save();

        return redirect()->route('admin.products'); // use the same route name here
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products'); // use the same route name here
    }
}
