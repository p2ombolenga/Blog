<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="w-screen bg-teal-500 text-teal-50 font-bold">
        <div class="hidden md:flex  justify-around p-4">
            <div class="flex items-center space-x-4 ">
                <div class=" @if (Request::path() == '/') px-4 py-2 bg-teal-700  rounded @endif"><a href="/" class="px-4 py-2 hover:bg-teal-700  rounded">Home</a></div>
                <div class="@if (Request::path() == '/posts') px-4 py-2 bg-teal-700  rounded @endif"><a href="#" class="px-4 py-2 hover:bg-teal-700  rounded">Link 1</a></div>
                <div class="@if (Request::path() == 'home') px-4 py-2 bg-teal-700  rounded @endif"><a href="#" class="px-4 py-2 hover:bg-teal-700  rounded">Link 2</a></div>
            </div>
            <div class="flex items-center">
                <div class="@if (Request::path() == 'logout') px-4 py-2 bg-teal-700  rounded @endif">
                    <a href="" class="px-4 py-2 hover:bg-teal-700  rounded">Logout</a>
                </div>
            </div>
    
        </div>  
        <div class="md:hidden flex justify-end p-2">
             <button class="mobile-menu-btn bg-teal-800 text-teal-50 px-4 py-2 rounded hover:bg-teal-900 transition:easy-in-out ">Menu</button>
        </div>
        </nav>
        <div class="mobile-menu hidden sm:hidden w-fit bg-gray-300 text-gray-800 px-2 py-5 rounded space-y-3">
            <div class="space-y-3">
                <div class=""><a href="" class="w-full px-4 py-2 hover:bg-gray-400  rounded">Home</a></div>
                <div class=""><a href="" class="w-full px-4 py-2 hover:bg-gray-400  rounded">Home</a></div>
                <div class=""><a href="" class="w-full px-4 py-2 hover:bg-gray-400  rounded">Home</a></div>
            </div>
            <div class="">
                <div><a href="" class="px-4 py-2 hover:bg-gray-400  rounded">Logout</a></div>
            </div>
    
        </div>
        <script>
            const btn = document.querySelector('.mobile-menu-btn');
            const menu = document.querySelector('.mobile-menu');
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        </script>
</body>
</html>