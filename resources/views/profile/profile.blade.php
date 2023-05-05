@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection
@section('head_script')
@endsection
@section('content')
    <div>
        <div name="header">

        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="text-2xl">
                            {{ __('User Profile') }}
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="p-4">
                                <p class="text-lg font-medium text-gray-700">{{ __('Name') }}</p>
                                <p>{{ $user->name }}</p>
                            </div>

                            <div class="p-4">
                                <p class="text-lg font-medium text-gray-700">{{ __('Email') }}</p>
                                <p>{{ $user->email }}</p>
                            </div>

                            <div class="p-4">
                                <p class="text-lg font-medium text-gray-700">{{ __('Phone Number') }}</p>
                                <p>{{ $user->phone_number }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
