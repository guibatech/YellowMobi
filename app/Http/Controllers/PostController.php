<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Models\Post as Post;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\Session as Session;
use App\Models\PostImage as PostImage;
use \Exception as Exception;

class PostController extends Controller {

    public function store(Request $request): RedirectResponse {

        try {

            $newPost = new Post();
            $newPost->content = $request->postText;
            $newPost->user_id = Auth::user()->id;
            $newPost->save();

            if ($request->hasFile('postImage') && $newPost->id != null) {
                
                $newPostImage = new PostImage();
                $newPostImage->post_id = $newPost->id;
                $newPostImage->path = $request->postImage->store('post_images');
                $newPostImage->save();
                
            }
            
            Session::flash('post-created', "We're sure the world will love to read what you have to say!");
            
            return redirect()->route('explore');
        
        } catch (Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to post at the moment. Try again later.'
            ]);

        }

    }

}
