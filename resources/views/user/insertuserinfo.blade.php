@include('file.header')
<title>User Information</title>
@include('file.body')
@livewire('navigation')
<div class="w-full h-full relative flex justify-center items-center">
<div class="w-full max-w-xs ">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/insert/myinfo" method="POST">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="age">
          Age
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" name="age" type="number" placeholder="Age">
      </div>
      <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="facebook_link">
            Facebook Link
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="facebook_link" name="facebook_link" type="text" placeholder="Facebook Link">
      </div>
      <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="instagram_link">
            Instagram Link
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="instagram_link" name="instagram_link" type="text" placeholder="Instagram Link">
      </div>
      <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="relationship_status">
             Relationship Status
        </label>
        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="relationship_status" name="relationship_status" type="text" placeholder="Relationship Status">
      </div>
      <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="public">
             Show it in profile
        </label>
        <input id="yes" name="public" value="yes" type="radio"><label for="yes" class="ml-1 mt-0">Yes</label>
        <input id="no" name="public" value="no" type="radio" class="ml-5"><label for="no" class="ml-1 mt-0">No</label>
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
