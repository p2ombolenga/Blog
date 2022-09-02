<nav class="w-full bg-white">
  <div class="hidden md:flex  justify-between p-4 px-32 text-lg">
      <div class="flex items-center space-x-4 ">
          <div class="">
                  <a href="/" class="@if(request()->path() == '/') text-cyan-600 font-semibold @endif">Home</a>
          </div>
          <div class="">
              <button class="category-toggle flex items-center">
                  Categories
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              <x-category-desktop-menu/>
          </div>
        @auth
            <div class="">
                <a href="/manage_posts" class="@if(request()->path() == 'manage_posts') text-cyan-600 font-semibold @endif">Posts</a>
            </div>
            @if(auth()->user()->is_Admin)
            <div class="">
                <a href="/add-category" class="@if(request()->path() == 'add-category') text-cyan-600 font-semibold @endif">Add Category</a>
            </div>
            @endif
          @endauth
      </div>
      <div class="flex items-center space-x-3">
          @guest
          <div class="">
              <a href="/signin" class="@if(request()->path() == 'signin') text-cyan-600 font-semibold @endif">Login</a>
          </div>
          <div class="">
              <a href="/register.create" class="px-4 py-2 bg-cyan-400 text-cyan-50 hover:bg-cyan-600 rounded focus:outline-none focus:ring-2 focus:ring-cyan-400">Register</a>
          </div>
          @else
          <a href="/personal-information/{{auth()->user()->id}}" class="px-5 py-1 border border-cyan-600 text-cyan-600 text-xs rounded-full bg-gray-100">
                {{auth()->user()->name}}
          </a>
          <div class="">
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="border-none">Logout</button>
              </form>
          </div>
          @endguest
      </div>

  </div>  
  <div class="md:hidden flex justify-end p-2">
       <button class="mobile-menu-btn bg-cyan-600 text-cyan-50 px-4 py-2 rounded focus:outline-none focus:ring focus:ring-cyan-500">Menu
           {{-- Menu icon svg --}}
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg> --}}
       </button>
  </div>
  </nav>
  <div class="mobile-menu hidden w-full bg-white text-gray-900 px-2 py-5 space-y-5 md:hidden absolute h-80">
      <div class="space-y-3">
          <div class="">
                <a href="/" class="@if(request()->path() == '/') text-cyan-600 font-semibold @endif">Home</a>
          </div>
          <div class="">
              <button class="category-toggle-toggle inline-flex">
                  Categories
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
                </button>
              <x-category-mobile-menu/>
          </div>
    @auth
            <div class="">
                <a href="/manage_posts" class="@if(request()->path() == 'manage_posts') text-cyan-600 font-semibold @endif">My Posts</a>
            </div>
            @if(auth()->user()->is_Admin)
            <div class="">
                <a href="/add-category" class="@if(request()->path() == 'add-category') text-cyan-600 font-semibold @endif">Add Category</a>
            </div>
            @endif
            <div class="">
                <a href="/personal-information/{{auth()->user()->id}}" class="">
                  {{auth()->user()->name}}
                </a>
            </div>
            <div class="">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
      @else
            <div class="">
                <a href="/signin" class="@if(request()->path() == 'signin') text-cyan-600 font-semibold @endif">Login</a>
            </div>
            <div class="">
                <a href="/register.create" class="@if(request()->path() == 'register.create') text-cyan-600 font-semibold @endif">Register</a>
            </div>
            @endauth
        </div>
  </div>
 
 
  <script defer>
      const btn = document.querySelector('.mobile-menu-btn');
      const menu = document.querySelector('.mobile-menu');
      btn.addEventListener("click", () => {
          if(menu.classList.toggle("hidden")){
            btn.innerText = 'Menu';
          }
          else{
            btn.innerText = 'Close';
          }
      });

      const categoryBtn = document.querySelector('.category-toggle');
    const categoryMenu = document.querySelector('.category-menu');
    categoryBtn.addEventListener('click', ()=> {
      categoryMenu.classList.toggle('hidden');
    });

    const toggleCategory = document.querySelector('.category-toggle-toggle');
    const catMenu = document.querySelector('.category-mobile-menu');
    toggleCategory.addEventListener('click',()=>{
      catMenu.classList.toggle('hidden');
    });
  </script> 

