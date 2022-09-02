<div class="hidden category-menu max-h-50 mt-5 bg-gray-100 w-40 rounded-xl absolute z-50">
    @foreach (\App\Models\Category::all() as $category)
    <div class="">
        <a href="/categories/{{$category->slug}}" class="text-gray-900 block px-3 py-1 hover:bg-blue-400 hover:text-blue-50 focus:outline-none focus:ring-blue-100 focus:text-blue-50 focus:bg-blue-400">{{$category->name}}</a>
    </div>
    @endforeach
</div>