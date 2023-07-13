@include('file.header')
<title>Profile</title>
@include('file.body')
@livewire('navigation')
<div class="relative overflow-hidden z-auto" style="width:100%; " id="p">
<div class="w-90  m-3 flex justify-center items-center flex-col rounded" style="margin-top:50px;height:300px;background-color:#00B8A9">
    <div class="flex flex-col justify-center items-center" >   
    <form action="/edit/profile/picture" method="POST">
            @method('PUT')
            @csrf
            <button type="submit">
         @if ($user->displaypicture != null)
            <img src="{{URL('storage/'.$user->displaypicture)}}" alt="" style="height: 100px;width:100px;border-radius:100%;{{$user->active_status == 'Online' ? 'border:2px solid green;' : 'border:2px solid blue;'}}">    
            @else
            <svg xmlns="http://www.w3.org/2000/svg" height="100" viewBox="0 96 960 960" width="100" class="ml-1 mt-0.5"><path d="M222 801q63-44 125-67.5T480 710q71 0 133.5 23.5T739 801q44-54 62.5-109T820 576q0-145-97.5-242.5T480 236q-145 0-242.5 97.5T140 576q0 61 19 116t63 109Zm257.814-195Q422 606 382.5 566.314q-39.5-39.686-39.5-97.5t39.686-97.314q39.686-39.5 97.5-39.5t97.314 39.686q39.5 39.686 39.5 97.5T577.314 566.5q-39.686 39.5-97.5 39.5Zm.654 370Q398 976 325 944.5q-73-31.5-127.5-86t-86-127.266Q80 658.468 80 575.734T111.5 420.5q31.5-72.5 86-127t127.266-86q72.766-31.5 155.5-31.5T635.5 207.5q72.5 31.5 127 86t86 127.032q31.5 72.532 31.5 155T848.5 731q-31.5 73-86 127.5t-127.032 86q-72.532 31.5-155 31.5ZM480 916q55 0 107.5-16T691 844q-51-36-104-55t-107-19q-54 0-107 19t-104 55q51 40 103.5 56T480 916Zm0-370q34 0 55.5-21.5T557 469q0-34-21.5-55.5T480 392q-34 0-55.5 21.5T403 469q0 34 21.5 55.5T480 546Zm0-77Zm0 374Z"  /></svg>
        
        @endif
        </button>
    </form>
    <span class="font-bold" style="font-size: 20px">{{$user->name}}</span>

    </div> 
   
    <div class="">
            <p> {{ $user->bio }} </p>
    </div>
    <div class="mt-1 relative" style="" id="message">
        <a href="/anonymous/message/{{$user->id}}" class="">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M240 657h313v-60H240v60Zm0-130h480v-60H240v60Zm0-130h480v-60H240v60ZM80 976V236q0-23 18-41.5t42-18.5h680q23 0 41.5 18.5T880 236v520q0 23-18.5 41.5T820 816H240L80 976Zm60-145 75-75h605V236H140v595Zm0-595v595-595Z"/></svg>
        </a>
    </div>
</div>

<div class="m-3 flex flex-col min-h-0 max-h-screen-2xl ss:justify-center ss:items-center s:flex-col rounded relative sm:flex-row" style="width:98%" >

<div class="relative w-11/12 sm:w-3/6 w-11/12 sm:w-3/6" >
@livewire('other-post', ['userId' => $user->id])
</div>


<div class="shadow-lg relative w-11/12 sm:w-3/6" style="">
    <div class=" ml-5 mt-5 mb-5 rounded-lg min-h-0 max-h-full" style="background-color:#00B8A9">
        <div class="m-5 shadow-lg">
      @if ($user->userinfos)
             @if ($user->userinfos->public != 'yes')
                <h1 class="text-center font-bold">Personal information of this user is private</h1>
          @else
        
          <div class="flex justify-between">
        <h1 class="font-bold pt-5">Personal Information</h1>       
          </div>
        <h1 class="font-semibold">Age:</h1>
        <p class="ml-5">{{$user->userinfos->age}}</p>
        <h1 class="font-semibold">Facebook Link:</h1>
        <a class="ml-5" href="{{$user->userinfos->facebook_link}}">{{$user->userinfos->facebook_link}}</a>
        <h1 class="font-semibold">Instagram Link:</h1>
        <a class="ml-5" href="{{$user->userinfos->instagram_link}}">{{$user->userinfos->instagram_link}}</a>
        <h1 class="font-semibold">Relationship Status:</h1>
        <p class="ml-5 pb-5">{{$user->userinfos->relationship_status}}</p>
             @endif
        @else
      @endif
           
    
    </div>
            
       
    </div>

    <div class="m-5 rounded-lg min-h-0 max-h-full" style="background-color:#00B8A9">
        <div class="m5 shadow-lg">
            <h1 class="font-bold ml-5">Photos</h1>
        </div>
        <div class="flex flex-col w-full sm:flex-row">
            
                @foreach ($user->photos as $photo)
                    <img src="{{URL('storage/uploaded/'.$photo->img)}}" alt="" class="hover:opacity-80 cursor-pointer rounded m-2 shadow-lg" style="height:130px; width:130px;">
                @endforeach       
        </div>
    </div>
</div>

</div>




</div>
<style>
   
    #message:hover::after{
        content: "Send anonymous message";
        white-space: nowrap;
        position: absolute;
        display: block;
        font-size: 10px;
        word-wrap:initial
    }
</style>
@include('file.footer')