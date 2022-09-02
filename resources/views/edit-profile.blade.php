<x-app-layout>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-2/5">
            <h2 class="text-center text-xl mb-5 block">Update Profile Picture</h2>
            <div>
                <input type="file" name="profile_picture" id="profile_picture" class="block p-2 w-full bg-white rounded-lg mb-1 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 file:bg-violet-100 file:border-none file:rounded-full file:text-violet-600 file:font-semibold @error('profile_picture') border-red-500 @enderror">
                @error('profile_picture')
                    <p class="text-red-600 text-xs mb-2">{{ $message }}</p>
                @enderror
                
            </div>
            <div class="flex justify-between items-center space-x-4 w-full">
                <img src="{{$user->profile_picture}}" alt="" class="w-20 h-30 rounded-lg object-cover">
                <button type="submit" class="px-3 py-1 bg-green-500 hover:bg-green-600 rounded text-green-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-green-300">Upload</button>
            </div>
        </div>
    </form>   
</x-app-layout>