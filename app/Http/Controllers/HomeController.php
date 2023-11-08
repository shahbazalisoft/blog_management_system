<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts =  Post::with(['comments', 'user'])->orderBy('created_at','DESC')->simplePaginate(10);
        return view('home', compact('posts'));
    }

    public function post_detail($id)
    {
        $post = Post::with(['comments', 'user'])->find($id);
        foreach ($post->comments as $val) {
            $val->comment_by = User::where('id', $val->user_id)->first()->name;
        }
        return view('post_detail', compact('post'));
    }

    public function add_comment(Request $request, $post_id)
    {
        if ($request['post_id'] == $post_id) {
            $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->post_id =  $post_id;
            $comment->comment =  $request->input('comment');

            $comment->save();
            return redirect()->route('post_detail', $post_id)->with('message', 'Comment added successfully');
        }
    }
}
