<?php

namespace App\Http\Livewire;

use App\Models\comments;
use App\Models\post;
use Livewire\Component;

class LiveComment extends Component
{
    public $post;
    public $postId;
    public $comment;


    public function mount()
    {
     
    }

    public function storeComment()
    {
        comments::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comment' => $this->comment
        ]);
        
    }
  
    public function render()
    {
        return view('livewire.live-comment', ['comments' => comments::where('post_id', $this->post->id)->orderBy('created_at', 'desc')->get()]);
    }
}
