<?php

namespace App\Http\Controllers\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LikePostController extends Controller
{
    public function likePost($id)
    {
        dd($id);
        // $post = Post::find($id);
        // $post->like();
        // $post->save();

        // return redirect()->route('post.list')->with('message','Post Like successfully!');
    }

}
