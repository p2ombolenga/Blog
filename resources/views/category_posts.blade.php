<x-app-layout>
  @forelse ($posts as $post)
  <x-post_card>
  <div class="w-full md:w-1/3">
      <img src="{{asset($post->image)}}" alt="" class="w-full md:h-fit object-cover rounded-xl">
    </div>
    <div class="w-full md:w-2/3">  
    <div class="flex justify-start px-3">
    <span class="px-5 py-1 border rounded-full bg-cyan-600 text-cyan-50">{{ $post->category->name}}</span>
    </div>
    <p class="text-extrabold text-2xl capitalize px-3"><a href="/posts/{{$post->slug}}">{{$post->title }} </a></p>
    <p class="text-extrabold text-xl mb-2 capitalize px-3">{{ $post->excerpt}}</p>
    <p class="p-3">{{ $post->body}}</p>
    
    <div class="px-3 py-1 flex items-start gap-2">
      <div>
        <img src="{{asset($post->user->profile_picture)}}" class="h-10 w-10 rounded-xl object-cover">
      </div>
      <div>
        @if(auth()->id() == $post->user_id)
        <a href="/personal-information/{{$post->user->id}}" class="text-gray-900 text-md capitalize font-semibold">
              you
        </a>    
          @elseif($post->user->is_Admin == 1)
          <a href="/personal-information/{{$post->user->id}}" class="text-gray-900 text-md capitalize font-semibold flex items-center">
              {{$post->user->name}}
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          </a>
          @else
          <a href="/personal-information/{{$post->user->id}}" class="text-gray-900 text-md capitalize font-semibold">
              {{$post->user->name}}
          </a>
          @endif
          <p class="text-xs">Published {{ $post->created_at->diffForHumans()}}</p>
        </div>
    </div>   
<div class="space-x-3 mt-2 px-3 flex">
  @if(Auth::check())
      @if(auth()->id() == $post->user_id && auth()->user()->is_Admin == 1 )

        <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </a>
        <a href="/editpost/{{$post->slug}}" class="px-2 py-1 rounded text-blue-50 bg-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </a>

      @elseif(auth()->id() == $post->user_id && auth()->user()->is_Admin != 1)

      <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </a>
      <a href="/editpost/{{$post->slug}}" class="px-2 py-1 rounded text-blue-50 bg-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
      </a>

        @elseif(auth()->id() != $post->user_id && auth()->user()->is_Admin == 1)

        <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </a>

      @endif
    @endif
    </div>  
    </div>
  </x-post_card>
    @empty
    <p class="p-5 m-16 text-center text-xl bg-blue-300 text-gray-50">There is no post yet in the selected category</p>
    @endforelse
</x-app-layout>