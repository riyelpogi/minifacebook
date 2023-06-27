<?php

namespace App\Http\Livewire;

use App\Events\NewComment;
use App\Models\comments;
use App\Models\post;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Livewire\Component;

class UserPost extends Component
{
    public $comment;


    protected $listeners = ['refreshUserPost' => '$refresh'];
    protected $rules = [
        'comment' => 'required|min:1'
    ];

    public function getListeners()
    {
        $userId = auth()->user()->id;
        return [
            "echo-private:Users,NewComment" => 'NewComment',
        ];
    }
    public function NewComment($data)
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
        $post = post::findOrFail($id);
        $postOwner = User::findOrFail($post->user_id);
        if ($postOwner->id == auth()->user()->id) {
            
        }else{
            $postOwner->notify(new CommentNotifications($user_commented));
        }


        $this->reset();
    }



    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('livewire.user-post', ['user' => $user]);
    }
}
