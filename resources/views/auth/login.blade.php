@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
@if($message = Session::get('success'))
<div class="bg-green-300">
    {{$message}}
</div>
@endif

@endsection
