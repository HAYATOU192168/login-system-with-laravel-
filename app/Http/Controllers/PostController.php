<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function deletepost(Post $post, Request $request){
        if(Auth::user()->id === $post->user_id){
            $post->delete();
        }
        return redirect('/');
    }
    


public function atuallyupdatepost(post $post, Request $request){
    if(auth->user()->id !==$post['user_id']){
        return redirect('/');

    }
    $incomingFields=$request->validate([
    'title'=>'requird',
    'body'=>'required'

    ]);


    $incomingFields['title']=strip_tags($incomingFields['title']);
    $incomingFields['body']=strip_tags($incomingFields['body']);
    $post->update($incomingFields);
    return redirect('/');
}

public function showEditscreen(post $post){
    // Check if there is an authenticated user
    if(!Auth::check()) {
        return redirect('/'); // Redirect to home or login page if not authenticated
    }

    // Retrieve the authenticated user
    $user = Auth::user();

    // Check if the authenticated user is the owner of the post
    if($user->id !== $post->user_id){
        return redirect('/'); // Redirect if not authorized
    }

    // Return the view for editing the post
    return view('edit-post', ['post' => $post]);
}


   public function createPost(Request $request){
    $incomingFields=$request->validate([
        'title'=>'required',
        'body'=>'required'
    ]);

    $incomingFields['title']=strip_tags($incomingFields['title']);
    $incomingFields['body']=strip_tags($incomingFields['body']);
    $incomingFields['user_id']= auth()->id();
    Post::create($incomingFields);
    return redirect('/');
   }
}