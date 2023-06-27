@include('file.header')
<title>Anonymous Message</title>
@include('file.body')
@livewire('navigation')

<div class="w-full flex justify-center items-center pt-10">
    <div class="w-80 bg-zinc relative rounded" style="margin-top:100px">
       <form action="/store/anonymous/message" method="POST">
        @csrf
        <input type="hidden" value="{{$user}}" name="to_user_id">
        <textarea name="message" id="message" placeholder="Write something here" cols="30" rows="10" class="bg-cyan font-semibold p-2 font-serif w-full h-24 rounded break-words"></textarea>
      
       <div class="flex justify-between items-center">
        <button type="submit" class="ml-2 p-1 bg-pink font-semibold rounded text-white" >Send</button>
        </form>
        <p id="shuffle" class="mr-2 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" id="dice"><path fill="#3a90cd" d="m16.496 7.037-7.498 4.09v8.523l7.414 4.345 7.498-4.345v-8.524l-7.414-4.09z"></path><path fill="#3a90cd" d="m16.414 15.138 7.5-4.005v8.522L16.414 24z"></path><path fill="#6fb7e6" d="M16.414 15.138 9 11.133v8.522L16.414 24z"></path><path fill="#74c1e6" d="m16.5 7.042 7.414 4.09-7.5 4.006L9 11.133z"></path><path fill="#eef2fa" d="M18.97 19.57c-.255-.17-.596.09-.852.426-.255.426-.255.852 0 .937.256.17.682 0 .853-.426.255-.426.255-.852 0-.937zm0-4.006c-.255-.17-.596 0-.852.426-.255.426-.255.852 0 .938.256.17.682-.092.853-.426.255-.427.255-.853 0-.938zm3.24 2.472c-.257-.092-.597.091-.853.51-.256.342-.256.768 0 .938.256.092.682-.091.937-.426.17-.426.17-.852-.085-1.022zm0-4.006c-.257-.091-.597.092-.853.426-.256.426-.256.852 0 1.023.256.091.682-.092.937-.512.17-.34.17-.766-.085-.937zm-1.62 2.983c-.256-.092-.597.09-.852.426-.256.426-.256.852 0 1.023.255.091.681-.092.852-.512.255-.34.255-.767 0-.937zm-6.647-1.449c.255-.17.596 0 .852.426.255.426.255.852 0 .938-.256.17-.682-.092-.852-.426-.256-.427-.256-.853 0-.938zm-3.239 2.472c.256-.092.597.091.852.51.256.342.256.768 0 .938-.255.092-.681-.091-.937-.426-.17-.426-.17-.852.085-1.022zm1.62-1.023c.255-.092.596.09.852.426.255.426.255.852 0 1.023-.256.091-.682-.092-.853-.512-.255-.34-.255-.767 0-.937z"></path><path fill="#b2d6f0" d="M17.351 11.473c0 .341-.34.597-.852.597-.596 0-.937-.256-.937-.597 0-.255.34-.51.937-.51.512 0 .852.255.852.51z"></path></svg></p>
       </div>
    
    </div>

</div>






<x-message />
<script>
    var btn = document.getElementById('shuffle');
    var message = document.getElementById('message');
    var val = document.getElementById('val');
    var array = [
        "What`s the weirdest thing you’ve done in public?",
        'What`s an embarrassing thing you’ve done and never told anyone about?',
        'What`s the most bizarre text you’ve ever received?',
        'What`s the cringiest thing you’ve ever put up on social media?',
        'What do you feel the most guilty about?',
        'Who do you wish you could reconnect with?',
        'How much does your personality change when you’re around different people?',
        'What stresses you out the most?',
        'When do you feel the most alone?',
        'Have you ever been in love?',
        'Do you believe in love at first sight?',
        'What’s the biggest lesson your last relationship taught you?',
        'What’s the nicest thing someone has done for you?',
        'If someone wrote a book about you, what would it be called?',
        'What’s one thing you would change about yourself?'

    ];
        btn.addEventListener('click', function(){
           var num = Math.floor(Math.random()*15);
           message.value = array[num];

        });
</script>













@include('file.footer')
