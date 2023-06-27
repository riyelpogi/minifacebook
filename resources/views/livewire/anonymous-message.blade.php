<div>
    <div class="w-full relative" style="padding-top:50px;">
        <div class="w-full flex justify-center items-center flex-wrap" style="gap:10px">
            @foreach ($user->messages as $message)
            <div class="w-80 rounded bg-cyan shadow-lg cursor-pointer hover:bg-zinc ">
                <div class="w-full  rounded mt-10" style="height: 80px;">
                    <p class="p-2 font-bold font-sans">{{$message->message}}</p>
                </div>
                <div class="flex justify-end">
                    <a href="" class="mr-2 mb-1 cursor-not-allowed"><svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M780 856V682q0-54-38-92t-92-38H234l154 154-42 42-226-226 226-226 42 42-154 154h416q78 0 134 55.5T840 682v174h-60Z"/></svg></a>
                </div>
            </div>
          
            @endforeach
        </div>
    </div>
</div>
