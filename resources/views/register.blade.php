<x-app-layout>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-2/5">
                <h2 class="text-center text-xl mb-5 block">Register</h2>
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name"  placeholder="Enter your Name" value="{{ old('name')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-600 text-xs ">{{ $message }}</p>
                @enderror
                <label for="email" class="block">Email</label>
                <input type="text" name="email" id="email" placeholder="Enter your Email"value="{{ old('email')}}" value="{{ old('email')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-600 text-xs ">{{ $message }}</p>
                @enderror
                <label for="profile_picture" class="block">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" value="{{ old('profile_picture')}}" class="block w-full rounded-lg mb-3 bg-white p-2 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 file:bg-violet-100 file:border-none file:rounded-full file:text-violet-600 file:font-semibold @error('profile_picture') border-red-500 @enderror">
                @error('profile_picture')
                    <p class="text-red-600 text-xs ">{{ $message }}</p>
                @enderror

                <label for="password" class="block">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your Password" value="{{ old('password')}}" class="block w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-red-600 text-xs ">{{ $message }}</p>
                @enderror
                <label for="password_confirmation" class="block">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your Password" value="{{ old('password_confirmation')}}" class="block w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('password_confirmation') border-red-500 @enderror">
                <div class="flex justify-end items-center space-x-4">
                    <p class="text-gray-500">Already have an account? <a href="/signin" class="text-blue-600 rounded p-1 focus:outline-none focus:ring-2 focus:ring-blue-300"><u>signin</u></a> </p>
                    <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 rounded text-teal-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-blue-300">Register</button>
                </div>
            </div>
        </form>
</x-app-layout>