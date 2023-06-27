<div>
    <div class="w-full flex justify-center items-center flex-col ">
        <div class="w-4/5 relative flex justify-center items-center flex-col" style="margin-top:100px;>
            <div class="mb-5 cursor-pointer">
                <a href="/markasread/all/notifications" class="bg-pink hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mark all as Read
                </a>
            </div>
    @foreach ($notifications as $notification)
            @empty($notification->data['message']) 
            <div class="div w-11/12 m-2 bg-gray rounded-2xl  overflow-hidden relative flex justify-around items-center {{ $notification->read_at == null ? 'bg-greenish' : 'bg-gray'}} sm:w-6/12">
            <a href="/post/{{$notification->data['post_id']}}/{{$notification->id}}"><h1 class="p-6"><b>{{ $notification->data['name'] }}</b> commented on your post</h1></a>
            <a href="/notification/delete/{{$notification->id}}" id="delete">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>
            </a>
          </div> 
            @endempty
    
            @empty($notification->data['name'])
            <div class="div w-11/12 m-2 bg-gray rounded-2xl  overflow-hidden relative flex justify-around items-center {{ $notification->read_at == null ? 'bg-zinc' : 'bg-gray'}} sm:w-6/12">
                <a href="/view/anonymous/message"><h1 class="p-6"><strong>Someone</strong> sent you a message</h1></a>
                <a href="/notification/delete/{{$notification->id}}" id="delete">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="30"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>
                </a>
            </div> 
            @endempty
    
    @endforeach 
    </div>
    </div>
    
</div>
