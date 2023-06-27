@include('file.header')
<title>Home</title>
@include('file.body')
@livewire('navigation')
<x-message />
<div class="relative lg:w-full ">
    @livewire('create-post')
</div>
<div class="">
@livewire('posts-and-comments')

</div>
    

@include('file.footer')
    
