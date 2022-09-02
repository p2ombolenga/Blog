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
        <x-auth-navbar/>
        <div class="min-h-screen w-full m-2 md:w-11/12 bg-white mx-auto md:rounded-xl p-2 my-4 md:mt-4">
            <main>
                {{ $slot }}
            </main>
        </div>
        <x-footer/>
        <button class="h-12 w-12 scrollTop bg-cyan-400 hover:bg-cyan-500 px-3 py-3 rounded-full fixed bottom-2 right-2 flex justify-center items-center text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
              </svg>
           </button>
        <script>
            const scrollTop = document.querySelector('.scrollTop');
            scrollTop.addEventListener("click", function(){
                window.scrollTo({
                    top: 0,
                    left: 0, 
                    behavior: "smooth"
                }); 
            });
        </script>
    </body>
</html>
