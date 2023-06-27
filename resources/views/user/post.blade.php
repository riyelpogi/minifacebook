@include('file.header')
<title>Post</title>
@include('file.body')
@livewire('navigation')
<div >
   @livewire('post', ['postId' => $post->id])
</div>
 

@include('file.footer')
