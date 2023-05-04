<?php

namespace App\Http\Controllers;

use App\Models\ProductCompany;
use Illuminate\Http\Request;

class ProductCompanyController extends Controller
{
    public function index()
    {
        $companies = ProductCompany::paginate(10);
        return view('admin.product-companies', compact('companies'));
    }

    public function create()
    {
        return view('admin.create-company');
    }

    public function store(Request $request)
    {

        $company = new ProductCompany;
        $company->company_name = $request->input('company_name');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->tax_payer_number = $request->input('tax_payer_number');
        $company->save();

        return redirect()->route('admin.product-companies'); // use the same route name here
    }

}
