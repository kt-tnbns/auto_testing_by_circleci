<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Catalyst - Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body class="antialiased">

        <div class="">
            <div class="px-8 py-3 text-center md:flex justify-between items-center bg-gray-700  text-gray-300">
                <h1 class="md:mb-0 font-bold uppercase text-xl">Task Catalyst</h1>
                <ul class="sm:mb-4 md:mb-0 md:flex gap-4">
                    <li class="cursor-pointer hover:underline">+250788877777</li>
                    <li class="md:border-2 border-red-500">  </li>
                    <li class="cursor-pointer hover:underline">alain@taskcatalyst.com</li>
                </ul>
                @if (Route::has('login'))
                    <ul class="md:flex gap-4">
                        @auth
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ url('/dashboard') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Dashboard</a></li>
                        @else
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ route('login') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Log in</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
            
            <div class="grid lg:grid lg:grid-cols-3">
                <div class="lg:col-span-1 bg-red-200">
                    <img class="object-cover lg:h-full lg:w-full opacity-80" src="img/landing-img.jpeg" alt="">
                </div>
                <div class="lg:col-span-2 overflow-hidden bg-gray-200">
                    <div class="bg-gray-200 transform -skew-y-6">
                        <div class="transform skew-y-6 text-center py-16">
                            <h1 class="text-xl">Welcome to <span class="text-gray-700 text-xl font-bold uppercase">Task Catalyst</span></h1>
                            <p class="italic mt-4 text-md">Become a productivity ninja with our minimalist yet simple, effective, and easy-to-use todo list app</p>
                        </div>
                    </div>
                    <div class="bg-gray-100 -mt-20 py-40 h-full text-center">
                        <div class="mb-20">
                            <h1 class="text-lg mb-2">Signup to receive free productivity tips</h1>
                            <div>
                                @if(session('subscribed')!== null)
                                    <p class="text-green-600 p-2 rounded mt-2">{{session('subscribed')}}</p>
                                @endif
                            </div>
                            <form action="{{route('welcome')}}" class="md:w-3/4 md:mx-auto bg-gray-200 py-4 shadow-lg rounded" method="POST">
                                @error('email')
                                        <p class="text-base pb-4 text-red-400">{{$message}}</p>
                                @enderror
                                @csrf
                                <input class="w-1/2 rounded-lg py-1 px-4 bg-gray-100 border-t-0 border-l-0 border-r-0 border-b-2 border-gray-500" type="email" name="email" placeholder="Enter your email">
                                <input class="bg-gray-400 py-1 px-4 rounded-lg text-gray-100 hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none" type="submit" value="subscribe">
                            </form>
                        </div>
                        <div class="text-gray-700">
                            <p>Failing to plan is planning to fail. - Alan Lakein</p>
                        </div>
                    </div>
                </div>
            </div>
            <x-footer/>
        </div>
    </body>
</html>

