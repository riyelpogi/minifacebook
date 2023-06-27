@include('file.header')
<title>Sign Up</title>
@include('file.body')
<div class="flex justify-center items-center flex-col">
  
<div class="w-11/12 sm:w-6/12 " style="margin-top: 100px">
    <h1 class="text-center font-bold" style="font-size:20px">Community Feed</h1>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/register/process" method="POST">
     @csrf
     <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="Name">
          Name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="name" name="name" value="{{old('name')}}">
        @error('name')
        <p>{{$message}}</p>
        @enderror
      </div>
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}">
        @error('email')
        <p>{{$message}}</p>
        @enderror
      </div>
      <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Password
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
        @error('password')
        <p>{{$message}}</p>
        @enderror
    </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
          Confirm Password
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password_confirmation">
        @error('password')
        <p>{{$message}}</p>
        @enderror
    </div>
      <div class="flex items-center justify-between">
        <button class="bg-cmmntbtn hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Sign Up
        </button>
       
      </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
      &copy;2023 Mini-Facebook. All rights reserved.
    </p>
  </div>
</div>














@include('file.footer')