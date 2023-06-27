@include('file.header')
<title>Photo</title>
@include('file.body')
@livewire('navigation')
<div class="w-full h-full relative flex justify-center items-center pt-16">
    <div class="w-full max-w-xs ">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/store/photo" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="img" >
              Image 1
            </label>
            <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="img" name="img" type="file">
        </div>
         
         
          <div class="flex items-center justify-between">
            <button class="bg-cmmntbtn hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Submit
            </button>
          
          </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
         
        </p>
      </div>
    </div>






@include('file.footer')