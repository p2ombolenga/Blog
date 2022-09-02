{{-- <x-app-layout>
    @foreach ($posts as $post)
    <x-post_card>
      <div class="flex justify-end">
        <div>
          <img src="" alt="" class="w-20 h-20 object-cover rounded-full">
        </div>
      <a href="/categories/{{$post->category->slug}}" class="text-gray-500 px-3 py-1 bg-gray-100 rounded-md hover:bg-gray-50">{{ $post->category->name}}</a>
      </div>
      <p class="text-extrabold text-2xl capitalize"><a href="/posts/{{$post->slug}}">{{$post->title }} </a></p>
      <p class="text-extrabold text-xl mb-2 capitalize">{{ $post->excerpt}}</p>
      <p>{{ $post->body}}</p>
      
      <div class="flex justify-between mt-2">
          @if(auth()->id() == $post->user_id)
            <p>Written By: <a href="" class="text-blue-500 underline font-semibold">You</a></p> 
          @else 
            <p>Written By: <a href="" class="text-blue-500 underline font-semibold">{{$post->user->name}}</a></p>  
          @endif
          <p class="text-gray-400"> <span class="text-green-600">Published </span> {{ $post->created_at->diffForHumans()}}</p>
      </div>
      @if(auth()->id() == $post->user_id)
      <div class="space-x-3 mt-2">
          <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1 rounded text-gray-50 capaitalize bg-red-500">clear</a>
          <a href="editpost/{{$post->id}}" class="px-2 py-1 rounded text-gray-50 capaitalize bg-green-500">Edit</a>
      </div>
      @endif
  </x-post_card>
  @endforeach
  <div class="w-3/4 mx-auto p-5 my-5">
     {{$posts->links()}}
  </div>
  </x-app-layout> --}}



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
@foreach ($posts as $post)
    {{$post->category->name}}
@endforeach
</body>
</html>






















