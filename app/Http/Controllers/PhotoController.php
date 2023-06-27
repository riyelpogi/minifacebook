<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function create(){
        return view('user.uploadphoto');
    }

    public function store(Request $request){
       $img = $request->file('img')->getClientOriginalName();
        
        $request->file('img')->storeAs('public/uploaded', $img);

        $photo = new Photos();
        $photo->user_id = auth()->user()->id;
        $photo->img = $img;
        $photo->save();
        return redirect('/myprofile')->with('message', 'Photos uploaded successfully');
       
    }

    
}
