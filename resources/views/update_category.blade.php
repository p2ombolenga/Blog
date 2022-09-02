<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-5/5 p-5 m-5 mx-auto bg-gray-50 rounded-xl mt-5 shadow-md md:w-2/3 lg:w-2/5 h-80">
            <h2 class="text-center text-xl mb-5 block">Change Category Info</h2>
            <label for="name" class="block">Category Name</label>
            <input type="text" name="name" id="name" placeholder="Type Category Name Here" value="{{$category->name}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="slug" class="block">Excerpt</label>
            <input type="text" name="slug" id="slug" placeholder="Type Category Slug Here" value="{{$category->slug}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <div class="flex justify-end">
                <button type="submit" class="px-3 py-1 bg-green-500 hover:bg-green-600 rounded text-green-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-green-300">Edit</button>
            </div>
        </div>
</x-app-layout>