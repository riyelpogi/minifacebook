<div>
    <div class="flex justify-between w-full max-w-screen fixed" style="height:50px;z-index:999;">
        <div class="ml-3">
          <a href="/home"><h1 class="font-bold text-xs pt-4 leading-relaxed sm:text-2xl sm:leading-loose sm:pt-0" >COMMUNITY FEED</h1></a>
        </div>

        <div class=" flex items-center justify-center flex-row mt-3">
          <form action="/search" action="GET">
          @csrf
          <div class="flex">
            <div class="">
              <input type="text" name="name" placeholder="Search Users" class="rounded-2xl pl-2 bg-zinc w-20 sm:w-80" >

            </div>
            <div class="">
            <button type="submit" class="font-semibold text-white rounded relative"><svg xmlns="http://www.w3.org/2000/svg"  height="25" viewBox="0 96 960 960" width="25"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg></button>
          </div>
          </div>
        </form>
        </div>

        <div class="flex mr-0">
          <nav class="mt-3">
               <div class="bg-gray block mr-1 mt-0.5" style="border-radius:100%;"><a href="/mynotifications" id="notifBtn" class="mt-3 relative shadow-lg " ><svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 96 960 960" width="25"><path d="M160 856v-60h84V490q0-84 49.5-149.5T424 258v-29q0-23 16.5-38t39.5-15q23 0 39.5 15t16.5 38v29q81 17 131 82.5T717 490v306h83v60H160Zm320-295Zm0 415q-32 0-56-23.5T400 896h160q0 33-23.5 56.5T480 976ZM304 796h353V490q0-74-51-126t-125-52q-74 0-125.5 52T304 490v306Z"/></svg>
                <span class="absolute block pl-1 pr-1" style="border-radius:100%;color:white;font-size:10px; background-color:blue;top:0;right:-2px;">
                  {{ $notification }}
                </span>
                </a></div> 
      
          </nav>
        <nav class="mt-3">
          <ul class="text-white font-semibold z-50">
               <li class="" style="margin-right: 30px">
                <div class="bg-gray block flex justify-center items-center" style="border-radius:100%"><button id="btn" class="p-1"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></button>
                </div>
               </li>
               <li class="mr-50 menu " >
                <a class="inline-block border border-white rounded py-1 px-3 bg-zinc hover:bg-purple" href="/home"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M220 876h150V626h220v250h150V486L480 291 220 486v390Zm-60 60V456l320-240 320 240v480H530V686H430v250H160Zm320-353Z"/></svg></a>
              </li>
              <li class="mr-50 menu mt-2" >
                <a class="inline-block border border-white rounded py-1 px-3 bg-zinc hover:bg-purple" href="/myprofile"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M480 575q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42ZM160 896v-94q0-38 19-65t49-41q67-30 128.5-45T480 636q62 0 123 15.5t127.921 44.694q31.301 14.126 50.19 40.966Q800 764 800 802v94H160Zm60-60h520v-34q0-16-9.5-30.5T707 750q-64-31-117-42.5T480 696q-57 0-111 11.5T252 750q-14 7-23 21.5t-9 30.5v34Zm260-321q39 0 64.5-25.5T570 425q0-39-25.5-64.5T480 335q-39 0-64.5 25.5T390 425q0 39 25.5 64.5T480 515Zm0-90Zm0 411Z"/></svg></a>
              </li>
              <li class="mr-50 mt-2 menu">
                  <form action="/logout" method="POST">
                      @csrf
                  <button class="inline-block bg-zinc border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-1 px-3 hover:bg-purple" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="20"><path d="M180 936q-24 0-42-18t-18-42V276q0-24 18-42t42-18h291v60H180v600h291v60H180Zm486-185-43-43 102-102H375v-60h348L621 444l43-43 176 176-174 174Z"/></svg></button>
                  </form>
              </li>
              
            </ul>
        </nav>
        </div>
      </div>
      
      <script>
        $(document).ready(function () {
            $('.menu').hide();
            $('#btn').on('click', function () {
                $('.menu').slideToggle();
                
            });
        });
      </script>
</div>
