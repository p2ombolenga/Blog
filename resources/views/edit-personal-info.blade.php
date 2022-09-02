<x-app-layout>
    <form action="" method="post">
        @csrf
        <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-2/5">
            <h2 class="text-center text-xl mb-5 block">Edit Your Personal Information</h2>
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" value="{{$user->name}}" class="block w-full rounded-lg mb-3 border border-gray-300 @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-600 text-xs ">{{ $message }}</p>
            @enderror
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email}}" class="block w-full rounded-lg mb-3 border border-gray-300 @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-600 text-xs ">{{ $message }}</p>
            @enderror
            <div class="flex justify-end items-center space-x-4">
                <button type="submit" class="px-3 py-1 bg-green-500 hover:bg-green-600 rounded text-green-50 h-10 w-32 justify-end">Edit</button>
            </div>
        </div>
    </form>
</x-app-layout>