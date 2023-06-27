<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\post;
use App\Models\User;
use App\Models\userInfo;
use App\Notifications\CommentNotifications;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class myController extends Controller
{
    

    public function login(){
    

        return view('user.login');
    }

    public function loginProcess(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        
        if (auth()->attempt($validated)) {
           $request->session()->regenerate();
           $user = User::findOrfail(auth()->user()->id);
           $user->active_status = "Online";
           $user->save();
            return redirect('/home')->with('message', 'Login Success');
        }else{
            return back()->withErrors(['email' => 'Invalid Email or Password'])->onlyInput('email');
        }
    }

    public function logoutProcess(Request $request){
        $user = User::findOrfail(auth()->user()->id);
        $user->active_status = "Offline";
        $user->save();
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('message', 'Logout Successful');
    }

    public function index(){
        $data = post::orderBy('created_at', 'desc')->get();
        
        return view('user.home', ['posts' => $data]);
    }



    public function show($id)
    {
        $data = User::findOrfail($id);
       
        return view('user.othersprofile', ['user' => $data]);
    }
    public function showuserprofile()
    {
        $data = User::findOrfail(auth()->user()->id);
        $notif = auth()->user()->unreadNotifications()->where('data->message', '!=', null)->count();
        return view('user.userprofile', ['user' => $data, 'notif' => $notif]);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'bio' => 'required',
        ]);
        $data = User::findOrfail($id);
        $data->bio = $validated['bio'];
        $data->save();

        return back()->with('message', 'Added Successfully');
    }

    public function storeDP()
    {
        return view('user.displaypicture');
    }

    public function updateDP(Request $request){
        $validated = $request->validate([
            'displaypicture' => 'required'
        ]);
        $data = User::findOrfail(auth()->user()->id);
        $data->displaypicture = $validated['displaypicture'];
        $data->save();

        return redirect('/home')->with('message', 'Display picture updated successfully');
    }

    public function updateInfo()
    {
        return view('user.insertuserinfo');
    }

    public function storeUserInfo(Request $request){
        $validated = $request->validate([
            'age' => '',
            'facebook_link' => '',
            'instagram_link' => '',
            'relationship_status' => '',
            'public' => 'required',
        ]);
        
        //dont mind this error this code still works
        auth()->user()->userinfos()->create($validated);
        return redirect('/myprofile')->with('message', 'Personal information updated successfully.');

    }

    public function updateUserInfo()
    {
        $user = User::findOrfail(auth()->user()->id);

        return view('user.updateuserinfo', ['user' => $user]);
    }

    public function updateUserInfoSubmit(Request $request)
    {
        $validated = $request->validate([
            'age' => '',
            'facebook_link' => '',
            'instagram_link' => '',
            'relationship_status' => '',
            'public' => 'required'
        ]);
        $user = User::findOrfail(auth()->user()->id);
        $user->userinfos->age = $validated['age'];
        $user->userinfos->facebook_link = $validated['facebook_link'];
        $user->userinfos->instagram_link = $validated['instagram_link'];
        $user->userinfos->relationship_status = $validated['relationship_status'];
        $user->userinfos->public = $validated['public'];
        $user->userinfos->save();

        return redirect('/myprofile')->with('message', 'Personal information updated successfully.');
    }

    public function showSearch(Request $request){
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $data = User::where('name', 'like', "%".$validated['name']."%")->get();

        return view('user.searchuser', ['users' => $data]);
    }


    public function showNotifications()
    {
        
        return view('user.notification');
    }

    public function showPost($postid, $id){
        $post = post::findOrfail($postid);
        $notification = auth()->user()->notifications->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return view('user.post', ['post' => $post]); 
    } 



}
