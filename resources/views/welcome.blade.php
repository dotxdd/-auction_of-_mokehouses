@extends('layouts.app')
@section('title','Page title' )
@section('title', 'Page Title')
@section('head_script')
<script type="text/javascript">
    function changeImage() {
        if(document.getElementById('mockup').src=='https://cdn.pixabay.com/photo/2016/05/20/11/51/smoking-oven-1404892_960_720.jpg'){
            document.getElementById('mockup').src ="https://cdn.pixabay.com/photo/2019/07/21/16/44/nostalgia-4353096_960_720.jpg"
        }
        else {
            document.getElementById('mockup').src = 'https://cdn.pixabay.com/photo/2016/05/20/11/51/smoking-oven-1404892_960_720.jpg';
        }
    }
</script>
@endsection
@section('sidebar')
    @parent
@endsection

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Your old five doesn't work like it should?</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Join us now and find something that will make your food great again! Better hurry up, you don't want to miss good prices.</p>
                <div class="flex flex-col lg:flex-row">
                    <a href="#" class="inline-flex items-center justify-center w-full mb-4 lg:mr-3 lg:w-auto lg:mb-0 px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Get started
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" onmouseover="changeImage()" class="inline-flex items-center justify-center w-full px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 lg:w-auto">
                        Speak to Sales
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 lg:flex lg:items-center">
                <img id="mockup" class="rounded-md mx-auto mt-8 lg:mt-0" src="https://cdn.pixabay.com/photo/2019/07/21/16/44/nostalgia-4353096_960_720.jpg" alt="mockup">
            </div>
        </div>
    </section>
@endsection
