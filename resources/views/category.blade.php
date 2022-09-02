<x-app-layout>
    <form action="" method="post">
        @csrf
    <div class="w-full md:p-5 lg:flex ">
        <div class="w-5/5 p-5 m-5 mx-auto bg-gray-50 rounded-xl mt-5 shadow-md md:w-2/3 lg:w-2/5 h-80">
            <h2 class="text-center text-xl mb-5 block">Add Category</h2>
            <label for="name" class="block">Category Name</label>
            <input type="text" name="name" id="name" placeholder="Type Category Name Here" value="{{ old('name')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="slug" class="block">Excerpt</label>
            <input type="text" name="slug" id="slug" placeholder="Type Category Slug Here" value="{{ old('slug')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <div class="flex justify-end">
                <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 rounded text-teal-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-blue-300">Submit</button>
            </div>
        </div>
        <div class="w-5/5 md:p-5 border border-gray-300 rounded-xl shadow-md md:m-5 md:5/5 lg:w-3/5">
            @if(session('success'))
            <div class="bg-green-300 text-white text-md block rounded-lg mb-2 p-3 text-center">
                {{session('success')}}
            </div>
            @endif 
                <div class="w-full sm:p-5 flex">
                        <div class="border-b text-lg text-center font-semibold w-full md:w-1/3">Category</div>
                        <div class="border-b text-lg text-center font-semibold w-full md:w-1/3">Slug</div>
                        <div class="border-b text-lg text-center font-semibold w-full md:w-1/3">Actions</div>
                </div>
                @forelse($categories as $category)
                <div class="w-full border-b md:flex hover:bg-gray-50">
                        <div class="px-5 py-1 semibold w-full md:w-1/3"><span class="md:hidden font-semibold">Category: </span> {{$category->name}}</div>
                        <div class="px-5 py-1 semibold w-full md:w-1/3"><span class="md:hidden font-semibold">slug: </span> {{$category->slug}}</div>
                        <div class="px-5 py-1 semibold w-full md:w-1/3 flex md:justify-center items-center space-x-2">
                            <a href="/add-category/{{$category->slug}}" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded focus:outline-none focus:ring-2 focus:ring-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                            </a>
                            <a href="/update_category/{{$category->slug}}" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                  </svg>
                            </a>
                        </div>
                </div>
                    @empty
                    <div class="w-full p-5 bg-gray-50 text-lg font-semibold text-center text-gray-700">
                        There is No Category Available Yet, check back later plz
                    </div>
                    @endforelse
                </div>
        </div>
    </form>
</x-app-layout>
