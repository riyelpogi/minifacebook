<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center">

    <div class="w-11/12 sm:w-6/12" style="margin-top: 100px">
      <div class="">
        <h1 class="font-bold text-center">Community Feed</h1>
      </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/login/process" method="POST">
         @csrf
            <div class="mb-4">
                @error('email')
                <p class="text-red-500 text-xs italic"> {{$message}} </p>
                @enderror
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" value="{{old('email')}}">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password">
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-cmmntbtn hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Sign In
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/register">
              Create a new account
            </a>
          </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
          &copy;2023 Mini-Facebook. All rights reserved.
        </p>
      </div>
</body>
</html>