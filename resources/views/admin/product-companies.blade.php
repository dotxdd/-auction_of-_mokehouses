@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="ml-6 mr-6 mt-6">
        <form method="POST" action="{{ route('admin.product-companies.post') }}">
            @csrf
            <label for="company_name" class="text-green-500 font-medium">Company Name:</label>
            <input type="text" name="company_name" id="company_name" class="rounded-md border-blue-500 border-2 p-2 w-full">
            <br>
            <label for="email" class="text-green-500 font-medium">Email:</label>
            <input type="email" name="email" id="email" class="rounded-md border-blue-500 border-2 p-2 w-full">
            <br>
            <label for="phone" class="text-green-500 font-medium">Phone:</label>
            <input type="tel" name="phone" id="phone" class="rounded-md border-blue-500 border-2 p-2 w-full">
            <br>
            <label for="tax_payer_number" class="text-green-500 font-medium">Tax Payer Number:</label>
            <input type="text" name="tax_payer_number" id="tax_payer_number" class="rounded-md border-blue-500 border-2 p-2 w-full">
            <br>
            <button type="submit" class="bg-green-500 text-white rounded-md px-4 py-2 mt-2 hover:bg-green-600 focus:bg-green-600">Add Company</button>
        </form>

        <table class="w-full border-collapse mt-6">
            <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Company Name</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Email</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Phone</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Tax Payer Number</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $company->company_name }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $company->email }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $company->phone }}</td>
                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">{{ $company->tax_payer_number }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $companies->links('pagination::tailwind') }}
    </div>
@endsection
