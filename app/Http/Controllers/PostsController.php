<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class postsController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
       
        
        return view(view:'index', data:['posts' => $postsFromDB]);
    }

    public function show(Post $post) 
    {
      //$singlePostFromeDB = Post::findOrFail($postId); == Post $post (Route Model Binding)
        
        return view(view:'show', data:['post' => $post]);
    }

    public function create()
    {
        $users = User::all();

       return view(view:'create', data:['users' => $users]);
    }

    public function store()
    {
        request()->validate([
            'title' =>['required', 'min:3'],
            'description' =>['required', 'min:5'],
            'post_creater' =>['required', 'exists:users,id']
        ]);

        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreater = request()->post_creater;

        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreater,
        ]);
        
        return to_route(route:'posts.index');
    }

    public function edit(Post $post)
    {
        
        $users = User::all();
       return view(view:'edit', data:['users' => $users, 'post' => $post]) ;
    }

    public function update($postId)
    {
        request()->validate([
            'title' =>['required', 'min:3'],
            'description' =>['required', 'min:5'],
            'post_creater' =>['required', 'exists:users,id']
        ]);

        $title = request()->title;
        $description = request()->description;
        $postCreater = request()->post_creater;

        $singlePostFromeDB = Post::find($postId);
        $singlePostFromeDB ->update([
            'title' =>$title,
            'description' => $description,
            'user_id' => $postCreater,
            
        ]);
        
        return to_route(route:'posts.show', parameters:$postId);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post ->delete();

        return to_route(route:'posts.index');
    }
}
