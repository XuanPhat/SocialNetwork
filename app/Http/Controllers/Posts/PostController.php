<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use \Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // b:foreach
    //    dd(Post::all());
        // $posts = Post::join('users','users.id','=','posts.user_id')->get(['posts.*','users.name','posts.created_at']);
        $posts = Post::all()->sortByDesc('created_at');
        return view('social_network.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('social_network.post');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'text' => 'required',
        //     // 'image' => 'required',
        // ]);
        $post = new Post();
        $post->user_id = Auth::User()->id;
        $post->text = $request->text;
        if($request->image == null)
        {
            $post->image = null;
        }
        else{
            $post->image = $request->image->getClientOriginalName();
        }
      
        $post->save();
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('image',$filename,'public');
        }
         else{
            $post->image = null;
            echo "Error image";
        }
        return redirect('/post')->with('success','Post updated successfully!');
    }

    public function likePost($id)
    {
        // $post = Post::find($id);
        // $post->like();
        // $post->save();

        // return redirect()->route('post.list')->with('message','Post Like successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
