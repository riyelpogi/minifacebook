<div>
          <input type="text" wire:model="search" placeholder="Search Users" class="rounded-2xl pl-2 bg-zinc" >

          <ul>
              @foreach ($users as $user)
              <li>{{$user->name}}</li>
               @endforeach
          </ul>
     
      </div>
</div>
