<x-app-layout>
<div class="container mx-auto flex justify-center">
    <div class="container px-4 sm:mt-16">
        <form action="" method="post">
            @csrf
            <div class="w-full p-5 m-5 bg-gray-50 rounded-xl mx-auto mt-5 shadow-md md:w-2/5">
                <h2 class="text-center text-2xl mb-5 block">Login</h2>
                    @if(session('status'))
                    <div class="bg-red-400 text-white text-sm block rounded-lg mb-2 p-3 text-center">
                        {{session('status')}}
                    </div>
                    @endif 
                <label for="email" class="block">Email</label>
                <input type="text" name="email" placeholder="Enter your Email Address" value="{{ old('email')}}" class="block w-full rounded-lg mb-3 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-600 text-xs">{{ $message }}</p>
                @enderror
                <label for="" class="block">Password</label>
                <input type="password" name="password" placeholder="Enter your Password" class="block w-full rounded-lg mb-5 border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100 @error('password') border-red-500 @enderror">
                @error('password')
                <p class="text-red-600 text-xs">{{ $message }}</p>
                @enderror
                    <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember"  class="rounded border border-gray-300 focus:border-gray-300  focus:outline-none focus:ring focus:ring-blue-100">
                            <label for="remember" class="">Remember Me</label>
                    </div>
                <div class="flex justify-between items-center">
                  <span class="text-gray-600">don't have an account? <a href="/register.create" class="text-blue-600 text-underline rounded p-1 focus:outline-none focus:ring-2 focus:ring-blue-300">Signup</a></span>  
                  <button type="submit" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 rounded text-teal-50 h-10 w-32 justify-end focus:outline-none focus:ring-2 focus:ring-blue-300">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>  
</x-app-layout>