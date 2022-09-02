<x-app-layout>
  <form method="GET" action="" class="group mt-2 mx-auto md:w-1/2">
    @csrf
    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search any post in any category by any author" class="border border-gray-200 w-full focus:border-none focus:ring focus:ring-blue-50 rounded-full placeholder-gray-400">
  </form>
  @auth
  <div class="w-3/4 text-md flex justify-start items-center px-5 mt-2">
    <a href="/create-post" class="px-3 py-2 rounded text-white bg-blue-600 hover:bg-blue-700 flex items-center  gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
    </svg> New Post</a>
  </div>
  @endauth

  @forelse ($posts as $post)
  <x-post_card>
    <div class="w-full md:w-1/2">
      <img src="{{asset($post->image)}}" alt="" class="w-full md:h-fit object-cover rounded-xl">
    </div>
    <div class="w-full md:w-2/3">  
      <div class="items-center">
    </div>
        <div class="flex justify-start px-3">
        <a href="/categories/{{$post->category->slug}}" class="px-5 py-1 border rounded-full border-cyan-600 text-cyan-600 hover:bg-cyan-600 hover:text-cyan-50">{{ $post->category->name}}</a>
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
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" viewBox="0 0 20 20" fill="currentColor">
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
        <div class="space-x-3 mt-2 px-3 pb-1 flex mb-5">
        @if(Auth::check())
          @if(auth()->id() == $post->user_id && auth()->user()->is_Admin == 1 )

            <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </a>
            <a href="/editpost/{{$post->slug}}" class="px-2 py-1 rounded text-blue-50 bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </a>

          @elseif(auth()->id() == $post->user_id && auth()->user()->is_Admin != 1)

          <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </a>
          <a href="/editpost/{{$post->slug}}" class="px-2 py-1 rounded text-blue-50 bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </a>

            @elseif(auth()->id() != $post->user_id && auth()->user()->is_Admin == 1)

            <a href="/manage_posts/{{$post->slug}}" class="px-2 py-1  rounded text-red-50 bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
            </a>

          @endif
        @endif
      </div>
      @auth
        <form action="/post/{{$post->slug}}/comment" method="post">
          @csrf
          <div class="bg-gray-200 w-full mt-2 p-3 rounded-xl">
              <div class="w-full flex space-x-3">
                  <div class="">
                    <img src="{{asset(auth()->user()->profile_picture)}}" alt="" class="w-20 h-20 object-cover rounded-xl">
                  </div>
                  <div class="flex-auto">
                    <textarea name="body" id="body" rows="3" value="old('body')" placeholder="Leave a comment here" class="w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100"></textarea>
                  </div>
              </div>
              <div class="flex justify-end items-center">
                <button type="submit" class="px-4 py-2 bg-blue-500 rounded text-white focus:outline-none focus:ring focus:ring-blue-600">Send</button>
            </div>
          </div>
        </form>
      @endauth 
      @if(!empty($post->comments))
          @foreach($post->comments as $comment)
              <div class="w-full flex p-3 mt-2 bg-gray-100 rounded-xl space-x-3">
                  <div class="w-20">
                    <img src="{{asset($comment->user->profile_picture)}}" alt="" class="w-20 h-20 object-cover rounded-xl">
                  </div>
                  <div class="w-full">
                      <div class="text-gray-900 text-lg font-semibold capitalize">{{$comment->user->name}}</div>
                      <div class="text-xs text-gray-900 mb-2">commented {{$comment->created_at->diffForHumans()}}</div>
                      <div>
                        <p class="">{{$comment->body}}</p>
                      </div>
                      @auth
                        <div class="flex space-x-4">
                          @if(auth()->id() == $comment->user->id)
                            <a href="/post/comment/{{$comment->id}}" class="text-xs text-blue-400">Delete</a>  
                          @endif
                            <a href="/post/comment/reply/{{$comment->id}}" class="text-xs text-blue-400">Reply</a>  
                        </div>
                      @endauth
                  </div>
              </div>
                  @if(!empty($comment->reply))
                      @foreach($comment->reply as $reply)
                            <div class="w-4/5 flex p-3 mt-2 ml-auto bg-blue-50 rounded-xl space-x-3">
                                <div class="w-20">
                                  <img src="{{asset($reply->user->profile_picture)}}" alt="" class="w-20 h-20 object-cover rounded-xl">
                                </div>
                                <div class="w-full">
                                    <div class="text-gray-900 text-lg font-semibold capitalize">{{$reply->user->name}}</div>
                                    <div class="text-xs text-gray-900 mb-2">Replied {{$reply->created_at->diffForHumans()}}</div>
                                    <div>
                                      <p class="">{{$reply->body}}</p>
                                    </div>
                                    @auth
                                      @if(auth()->id() == $reply->user->id)
                                        <div>
                                            <a href="/delete/reply/{{$reply->id}}" class="text-xs text-blue-400">Delete</a>  
                                        </div>
                                      @endif
                                    @endauth
                                </div>
                            </div>
                      @endforeach
                  @endif
          @endforeach
      @endif
    </div>
  </x-post_card>
    @empty
    <p class="p-4 m-5 md:m-8  bg-blue-300 rounded-xl flex justify-center items-center gap-4 shadow-lg">
      <span class="p-5 text-xl text-gray-50">There is no post yet, please comeback later</span> 
    </p>
    @endforelse
{{-- <div class="w-full md:w-3/4 mx-auto p-5 my-5">
  {{$posts->links()}}
</div> --}}
</x-app-layout>