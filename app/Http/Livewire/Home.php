<?php

namespace App\Http\Livewire;

use App\Models\comments;
use App\Models\post;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Home extends Component
{

    public $comment;
    public $subject;
    protected $listeners = ['refreshHome' => '$refresh'];

    protected $rules = [
        'comment' => 'required:min:1'
    ];

    public function storeComment($id)
    {
        $this->validate();
        comments::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id,
            'comment' => $this->comment
        ]);

        $userCommented = [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'post_id' => $id
        ];
            $post = post::findOrfail($id);
            $postOwner = User::findOrfail($post->user_id);
            if ($postOwner->id == auth()->user()->id) {
                
            }else{           
                $postOwner->notify(new CommentNotifications($userCommented));
        }

        $this->emit('refreshComponent');
        $this->reset();

    }

    public function storePost()
    {
        $this->validate([
            'subject' => 'required'
        ]);
        post::create([
            'user_id' => auth()->user()->id,
            'subject' => $this->subject
        ]);
        $this->reset();
        
    }

    public function render()
    {
        return view('livewire.home', ['posts' => post::orderBy('created_at', 'DESC')->get()]);
    }
}
