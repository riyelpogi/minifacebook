@include('file.header')
<title>Display Picture</title>
@include('file.body')
@livewire('navigation')
<div class="w-full max-w-screen">
    <form action="/update/profile/picture" method="POST">
        @method('PUT')
        @csrf
        <div class="flex flex-wrap justify-center items-center " style="gap:50px;height:300px">

        <div class="flex" style="width: 100px;position:relative">
        <input type="radio" value="img1.jpg" id="img1" class="radioBtn" name="displaypicture" style="width:100px; height:100px;"><label for="img1" selected><img src="{{URL('storage/img1.jpg') }}" alt="" style="width:100px; height:100px; border-radius:100%;position:absolute;left:0" class="cursor-pointer"></label>
      </div>
      <div class="flex" style="width: 100px;position:relative">
        <input type="radio" value="img2.jpg" id="img2" class="radioBtn"  name="displaypicture" style="width:100px; height:100px;"><label for="img2" selected><img src="{{URL('storage/img2.jpg') }}" alt="" style="width:100px; height:100px; border-radius:100%;position:absolute;left:0" class="cursor-pointer"></label>
    </div>
    <div class="flex" style="width: 100px;position:relative">
        <input type="radio" value="img3.jpg" id="img3" class="radioBtn" name="displaypicture" style="width:100px; height:100px;"><label for="img3" selected><img src="{{URL('storage/img3.jpg') }}" alt="" style="width:100px; height:100px; border-radius:100%;position:absolute;left:0" class="cursor-pointer"></label>

    </div>
    <div class="flex" style="width: 100px;position:relative">
        <input type="radio" value="img4.jpg" id="img4" class="radioBtn" name="displaypicture" style="width:100px; height:100px;"><label for="img4" selected><img src="{{URL('storage/img4.jpg') }}" alt="" style="width:100px; height:100px; border-radius:100%;position:absolute;left:0" class="cursor-pointer"></label>

    </div>
    <div class="flex" style="width: 100px;position:relative">
        <input type="radio" value="img5.jpg" id="img5" class="radioBtn"name="displaypicture" style="width:100px; height:100px;"><label for="img5" selected><img src="{{URL('storage/img5.jpg') }}" alt="" style="width:100px; height:100px; border-radius:100%;position:absolute;left:0" class="cursor-pointer"></label>

         </div>
       <button type="submit" id="btn" class="bg-emerald shadow-lg font-semibold p-1 rounded">Submit</button>
        </div>
    </form>
</div>










@include('file.footer')
