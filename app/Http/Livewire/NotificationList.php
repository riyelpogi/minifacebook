<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationList extends Component
{

    protected $listeners = ['refreshNotificationList' => '$refresh'];
    
    public function render()
    {
        return view('livewire.notification-list', ['notifications' => auth()->user()->notifications]);
    }
}
