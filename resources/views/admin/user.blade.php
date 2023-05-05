@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection
@section('head_script')
@endsection
@section('content')
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Phone Number</th>
                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 bg-gray-100"></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->phone_number }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $user->role }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        @if(Auth::user()->role === 2)
                            <a href="{{ route('users.impersonate', $user) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Impersonate</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
