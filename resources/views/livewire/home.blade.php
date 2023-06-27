@include('file.header')
<div>
@livewire('navigation')
<div class="lg:w-full ">
    <div class="" style="padding-top:50px;">
    <form action="/post" method="POST"class="flex items-center justify-center">
        @csrf
        <textarea name="subject" id="" cols="30" rows="10" placeholder="Write what`s on your mind here." class="rounded mt-5 shadow-lg pt-5 pl-5" style="width:330px;height:100px;"></textarea>
        <button type="submit" class="ml-3 inline-block border border-blue-500 rounded py-1 px-3 bg-purple text-white font-semibold">Post</button>
    </form>
    @error('subject')
    <p style="color:red;font-size:15x" class="text-center">{{$message}}</p>
    @enderror
    </div>
   
</div>
   @livewire('posts-and-comments')
</div>
@include('file.footer')




