<x-app-layout>
     @if(session('status'))
        <div class="w-full md:w-2/3 lg:w-1/2 mx-auto rounded-xl m-8 p-5 border border-gray-200 text-sm text-red-50  bg-red-400 text-center">
            {{session('status')}}
        </div>
        @endif
     @if(session('success'))
        <div class="w-full md:w-2/3 lg:w-1/2 mx-auto rounded-xl m-8 p-5 border border-gray-200 text-sm text-green-50 bg-green-300 text-center">
            {{session('success')}}
        </div>
        @endif
    <div class="w-full md:w-2/3 lg:w-1/2 mx-auto rounded-xl m-8 p-5 bg-gray-50 border border-gray-200 space-y-3">
        <div class="w-full mx-auto text-center text-lg font-semibold text-gray-800">
            Personal Information
        </div>
        <div class="w-full flex justify-center items-center mx-auto mt-1">
            @if($user->profile_picture == NULL)
                    <span class="bg-gray-100 text-gray-500 rounded-full p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    </span>
            @else
                <a href="" class="p-2">
                    <img src="{{$user->profile_picture}}" class="h-40 w-40 rounded-full object-cover">
                </a>
            @endif
        </div>
        <div class="w-full border-b border-gray-100 capitalize">
            <span class="flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
              </svg>
            {{$user->name}}
            </span>
        </div>
        <div class="w-full border-b border-gray-100">
            <span class="flex gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
              </svg>
            {{$user->email}}
        </span>
        </div>
        @if(auth()->id() == $user->id)
            <div class="w-full md:flex gap-4 border-b border-gray-100">
                <a href="/edit-profile/{{$user->id}}" class="flex text-blue-500 my-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    Update Profile
                </a>
                <a href="/edit-personal-info/{{$user->id}}" class="flex text-blue-500 my-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Personal Information
                </a>
            </div>
        @endif
    </div>
</x-app-layout>