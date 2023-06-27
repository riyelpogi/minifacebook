<?php

namespace App\Http\Livewire;

use App\Events\NewComment;
use App\Models\comments;
use App\Models\post as ModelsPost;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Livewire\Component;

class Post extends Component
{
    public $postId;
    public $comment;
    public $post;

    protected $listeners = ['refreshPost' => '$refresh'];
    protected $rules = [
        'comment' => 'required|min:1'
    ];

    public function getListeners()
    {
        return [
            "echo-private:Users,NewComment" => 'NewComment'
        ];
    }

    public function NewComment()
    {
        
    }


    public function storeComment($id)
    {
        $this->validate();
        $comment = comments::create([
            'user_id' => auth()->user()->id,
            'post_id' => $id,
            'comment' => $this->comment
        ]);
        event(new NewComment($comment));

        $user_commented = [
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'post_id' => $id
        ];
        $post = ModelsPost::findOrFail($id);
        $postOwner = User::findOrFail($post->user_id);
        if ($postOwner->id == auth()->user()->id) {
            
        }else{
            $postOwner->notify(new CommentNotifications($user_commented));
        }


        $this->reset('comment');
    }


    public function render()
    {
        $this->post = ModelsPost::findOrFail($this->postId);
    
        return view('livewire.post');
    }
}
