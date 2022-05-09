<?php

namespace App\Http\Controllers\Posts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        // dd($id);
         return view('social_network.editProfile',compact('user'));
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
    public function store(Request $request)
    {
        //
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
        // dd($request->image->getClientOriginalName());
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'description' => 'required'
            ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->mobile = $request->phone;
        $user->address = $request->address;
        $user->description = $request->description;
        if( $request->image != null)
        {
            $user->image = $request->image->getClientOriginalName();
        }
        $user->update();
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('image',$filename,'public');
        }
         else{
            echo "Error image";
        }
        return redirect('/post')->with('success','Profile updated successfully!');
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
