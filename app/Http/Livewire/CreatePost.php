<?php

namespace App\Http\Livewire;

use App\Events\NewPost;
use App\Models\post;
use Livewire\Component;

class CreatePost extends Component
{
    public $subject;

    protected $rules = [
        'subject' => 'required|min:2'
    ];

    public function storePost()
    {
        $this->validate();

        $post = post::create([
            'user_id' => auth()->user()->id,
            'subject' => $this->subject
        ]);

        event(new NewPost($post));
        $this->reset();
    }


    public function render()
    {
        return view('livewire.create-post');
    }
}
