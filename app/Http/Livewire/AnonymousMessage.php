<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AnonymousMessage extends Component
{
    protected $listeners = ['refreshAnonymousMessage' => '$refresh'];
    
    public function render()
    {
        $user = User::findOrFail(auth()->user()->id)->first();
        foreach (auth()->user()->notifications as $notification) {
            if (empty($notification->data['name'])) {
                $notification->markAsRead();
            }
        }
        return view('livewire.anonymous-message', ['user' => $user]);
    }
}
