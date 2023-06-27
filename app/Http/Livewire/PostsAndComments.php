<?php

namespace App\Http\Livewire;

use App\Events\NewComment;
use App\Models\comments;
use App\Models\post;
use App\Models\User;
use App\Notifications\CommentNotifications;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;

class PostsAndComments extends Component
{
 
    public $comment;
    public $a;
    public $userId;
    public $posts = [];
    public $comments = [];

    protected $rules = [
        'comment' => 'required:min:1'
    ];

  

    public function getListeners()
    {
        $userId = auth()->user()->id;
        return [
            "echo-private:Users,NewComment" => 'NewComment',
            "echo-private:Post,NewPost" => 'NewPost'
        ];
    }
    public function NewComment($data)
    {

    } 
    public function NewPost($data)
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

       // broadcast(new \App\Events\NewComment($comment));

   
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

        $this->reset('comment');

    }
    public function render()
    {
         

        return view('livewire.posts-and-comments', ['posts' => $this->posts = post::orderBy('created_at', 'DESC')->get() ]);
    }
}
