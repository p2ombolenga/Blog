<x-app-layout>    
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-3/5">
            <h2 class="text-center text-xl mb-5 block">Edit Post Content</h2>
            <label for="" class="block">Title</label>
            <input type="text" name="title" value="{{$posts->title}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 ">
            @error('title')
                <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror
            <label for="" class="block">Excerpt</label>
            <input type="text" name="excerpt" value="{{$posts->excerpt}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 ">
            @error('excerpt')
                <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror
            <label for="" class="block">Slug</label>
            <input type="text" name="slug" value="{{$posts->slug}}" class="block w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100">
            @error('slug')
                <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror
            <label for="image" class="block">Image</label>
            <div class="flex items-start gap-3">
                <input type="file" name="image" id="image" class="block w-full p-2 rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 bg-white file:bg-violet-100 file:border-none file:rounded-full file:text-violet-600 file:font-semibold @error('image') border-red-500 @enderror">
                <img src="{{$posts->image}}" alt="" class="w-20 h-30">
            </div>
            @error('image')
                <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
            @enderror
            <label for="" class="block">Body</label>
            <textarea type="text" name="body" cols="10" class="block w-full rounded-lg mb-5 border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100">
                {{$posts->body}}
            </textarea>
            @error('body')
                <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror
            <label for="category_id" class="block">Category</label>
            <select name="category_id" id="category_id" class="block w-full rounded-lg mb-5 px-1 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100  ">
                <option value="{{$posts->category->id}}">{{$posts->category->name}}</option>
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-600 text-xs">{{ $message }}</p>
            @enderror
            <div class="flex justify-end">
                <button type="submit" class="px-3 py-1 bg-green-500 hover:bg-green-600 rounded text-teal-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-green-300">Edit</button>
            </div>
        </div>
    </form>
</x-app-layout>
