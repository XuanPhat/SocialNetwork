<?php

namespace App\Http\Controllers\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostLike;
use \Illuminate\Support\Facades\Auth;
class LikePostController extends Controller
{
    // public function CountLikePost()
    // {
    //     $postLikes = PostLike::all()->where('post_id','=',29)->groupBy('post_id');
    //     return view('social_network.post',compact('postLikes'));
    // }

    public function likePost(Request $request)
    {
        
        $PostLike = new PostLike();
        $PostLike->user_id = Auth::User()->id;
        $PostLike->post_id = $request->post_id;
        // // dd($id);
        // // $post = Post::find($id);
        // // $post->like();
        $PostLike->save();
        return response()->json(['success'=> 'like post successfully']); 
    }

    public function unlikePost(Request $request)
    {
         $unlike = PostLike::where('post_id','=',$request->post_id)->where('user_id','=',Auth::User()->id);
         $unlike->delete();
         return response()->json(['success'=> 'unlike post successfully']);
    }

}
