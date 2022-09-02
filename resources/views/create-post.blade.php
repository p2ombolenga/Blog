<x-app-layout>
    {{-- <x-records-menu/> --}}
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-3/5">
            <h2 class="text-center text-xl mb-5 block">Add Post</h2>
            <label for="title" class="block">Title</label>
            <input type="text" name="title" id="title" placeholder="Post Title" value="{{ old('title')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="excerpt" class="block">Excerpt</label>
            <input type="text" name="excerpt" id="excerpt" placeholder="Post Excerpt" value="{{ old('excerpt')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('excerpt') border-red-500 @enderror">
            @error('excerpt')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="slug" class="block">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Post Slug" value="{{ old('slug')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="image" class="block">Image</label>
            <input type="file" name="image" id="image" class="block w-full p-2 rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 bg-white file:bg-violet-100 file:border-none file:rounded-full file:text-violet-600 file:font-semibold @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="body" class="block">Body</label>
            <textarea type="text" name="body" id="body" placeholder="Post Body" cols="10" class="block w-full rounded-lg mb-3 px-1 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('body') border-red-500 @enderror">
                {{ old('body')}}
            </textarea>
            @error('body')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="category_id" class="block">Category</label>
            <select name="category_id" id="category_id" class="block w-full rounded-lg mb-3 px-1 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('category_id') border-red-500 @enderror">
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <div class="flex justify-end">
                <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 rounded text-teal-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-blue-300">Post</button>
            </div>
        </div>
    </form>
</x-app-layout>
