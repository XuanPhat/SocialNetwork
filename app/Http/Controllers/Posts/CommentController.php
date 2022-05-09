<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use \Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comments = Comment::all();
        // return view('social_network.post',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Addcomment(Request $request)
    {
        $Comment = new Comment();
        $Comment->post_id = $request->post_id;
        $Comment->content = $request->content;
        $Comment->user_id = Auth::User()->id;
        $Comment->save();
        return response()->json(['post_id'=> $request->post_id,'content'=>$request->content]); 
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
    public function update(Request $request)
    {
        $commentUpdate = Comment::findOrFail($request->comment_id);
        $commentUpdate->content = $request->content;
        $commentUpdate->update();
        return response()->json(['content'=>$request->content,'comment_id'=>$request->comment_id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commentDelete = Comment::find($id);
        $commentDelete->delete();
        return response()->json(['comment_id'=>$id]); 
    }
}
