<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Auth;

class PostController extends Controller
{
    // indexDashboard
    public function indexDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    // inser post
    public function indexCreatePost(Request $request)
    {
        $request->validate([
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request->input('body');
        $message = 'There was an error';
        if ($request->user()->posts()->save($post))
        {
            $message = 'Post successfully created';
        }
        return \redirect()->route('users.dashboard')->with(['message' => $message]);
    }

    // delete post
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return \redirect()->route('users.dashboard')->with(['message' => 'Succssfully deleted']);
    }

    // like post
    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) 
        {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like)
            {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    // logout
    public function getLogout()
    {
        Auth::logout();
        return \redirect()->route('signup');
    }
}
