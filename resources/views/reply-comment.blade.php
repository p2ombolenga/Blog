<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen w-full m-2 md:w-11/12 bg-white mx-auto md:rounded-xl p-2 my-4 md:mt-4">
            <main>
                <div class="w-full md:w-1/2 mx-auto bg-gray-200 p-2 rounded-xl">
                    <div class="w-full flex p-3 mt-2 bg-gray-100 rounded-xl space-x-3">
                        <div class="w-20">
                        <img src="{{asset($comment->user->profile_picture)}}" alt="" class="w-20 h-20 object-cover rounded-xl">
                        </div>
                        <div class="w-full">
                            <div class="text-gray-900 text-lg font-semibold capitalize">{{$comment->user->name}}</div>
                            <div class="text-xs text-gray-900 mb-2">commented {{$comment->created_at->diffForHumans()}}</div>
                            <div>
                            <p class="">{{$comment->body}}</p>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="w-full p-3">
                            <div class="w-full flex space-x-3">
                                <div class="">
                                <img src="{{asset(auth()->user()->profile_picture)}}" alt="" class="w-20 h-20 object-cover rounded-xl">
                                </div>
                                <div class="flex-auto">
                                <textarea name="body" id="body" rows="3" value="old('body')" placeholder="Reply on a comment" class="w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('body') border-red-400 @enderror"></textarea>
                                @error('body')
                                    <p class="text-sm text-red-400"> {{$message}} </p>
                                @enderror
                                </div>
                            </div>
                            <div class="flex justify-end items-center">
                            <button type="submit" class="px-4 py-2 bg-blue-500 rounded text-white focus:outline-none focus:ring focus:ring-blue-600">Reply</button>
                        </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
