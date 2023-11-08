<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =  Post::where('user_id',Auth::id())->simplePaginate(10);
        return view('post.user_post', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.add_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title =  $request->input('title');
        $post->content =  $request->input('content');

        $post->save();

        return redirect()->route('posts.index')->with('message', 'Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where(['user_id'=>Auth::id(),'id'=>$id])->first();
        if($post){
            return view('post.edit_post', compact('post'));
        }else{
            return redirect()->route('posts.index');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);dd($id);
        $post->title =  $request->input('title');
        $post->content =  $request->input('content');

        $post->save();

        return redirect()->route('posts.index')->with('message', "Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deleted dsuccesssfully');

    }
}
