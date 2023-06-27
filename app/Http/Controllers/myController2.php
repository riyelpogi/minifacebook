<?php

namespace App\Http\Controllers;

use App\Models\AnonymousMessage;
use App\Models\post;
use App\Models\User;
use App\Models\userInfo;
use App\Notifications\MessageNotifications;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class myController2 extends Controller
{
    public function create(){
        return view('user.register');

    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'min:6'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5'] 
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        auth()->login($user);

        return redirect('/home')->with('message', 'Login Success');
    }
    
    public function createAnonymousMessage($id){

        
        return view('user.anonymousmessage', ['user' => $id]);
    }


    public function storeAnonymousMessage(Request $request){
        $validated = $request->validate([
            'to_user_id' => 'required',
             'message' => ['required', 'min:3', 'max:150']
        ]);

        $message = AnonymousMessage::create([
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $validated['to_user_id'],
            'message' => $validated['message']
        ]);
        $messageSender = [
            'user_id' => auth()->user()->id,
            'message' => $validated['message']
        ];
        $toUser = User::findOrFail($validated['to_user_id']);
        Notification::send($toUser, new MessageNotifications($messageSender));


        return back()->with('message', 'Anonymous message sent');

    }

    public function showAnonymousMessage()
    {
        $user = User::findOrFail(auth()->user()->id)->first();
        foreach (auth()->user()->notifications as $notification) {
            if (empty($notification->data['name'])) {
                $notification->markAsRead();
            }
        }
        return view('user.myanonymousmessage', ['user' => $user]);
    }

    public function setAsPublic(){
        $userinfo = userInfo::where('user_id', '=', auth()->user()->id)->get();
        foreach ($userinfo as $value) {
            $value->public = 'yes';
            $value->save();
        }

        return back()->with('message', 'Set as public successful');
    }
    public function setAsPrivate(){
        $userinfo = userInfo::where('user_id', '=', auth()->user()->id)->get();
        foreach ($userinfo as $value) {
            $value->public = 'no';
            $value->save();
        }

        return back()->with('message', 'Set as private successful');
    }
    public function deleteNotification($id){
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->delete();

        return back()->with('message', 'Notification deleted');
    }

    public function markAsReadAllNotifications()
    {
       foreach (auth()->user()->notifications as $notification) {
                $notification->markAsRead();
       }
        return back()->with('message', 'All notifications deleted');

    }

    public function destroy($id){
        $post = post::findOrFail($id)->first();
        foreach ($post->comments as $comment) {
            $comment->delete();
        }
        
        $post->delete();

        return back()->with('message', 'Post deleted successfully');

    }

    public function asd($postId)
    {
        
        return view('asd', ['post' => post::findOrFail($postId)]);
    }




}
