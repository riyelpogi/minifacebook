<?php

namespace App\Http\Livewire;

use App\Events\NewComment;
use App\Models\comments;
use App\Models\post;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Livewire\Component;

class OtherPost extends Component
{
    public $userId;
    public $comment;

    protected $listeners = ['refreshOtherPost' => '$refresh'];
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
    //    broadcast(new \App\Events\NewComment($comment));

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


        $this->reset('comment');
    }
    
    public function render()
    {
        return view('livewire.other-post', ['posts' => post::where('user_id', $this->userId)->get()]);
    }
}
