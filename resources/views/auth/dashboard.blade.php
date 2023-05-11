@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')
@section('head_script')
    <script>
        function hideScrollbar() {
            document.body.classList.add('hide-scrollbar');
        }
    </script>
@endsection
@section('sidebar')
    @parent

@endsection

@section('content')

    <div id="background-video-container" class="w-full w-full">
        <video autoplay loop muted playsinline id="background-video">
            <source src="https://videos.pond5.com/loading-wood-rustic-wood-oven-footage-110858202_main_xxl.mp4" type="video/mp4">
        </video>

        <div id="scroll-up-message">Cosy, isn't it? Welcome Back</div>
    </div>
@endsection
