<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\View\Component as ViewComponent;

class Navigation extends Component
{

    public $notification;
    public $search = "";

    protected $listeners = ['refreshComponent' => 'notif'];

    public function notif()
    {
        $this->notification = count(auth()->user()->unreadNotifications);

    }


    public function render()
    {
        $this->notification = count(auth()->user()->unreadNotifications);
        
        return view('livewire.navigation', );
    }



    
}
