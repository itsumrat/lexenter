<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
class UserProfile extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit()
    {
        $id=Auth::user()->id;
        $userById = User::where('id', $id)->first();
        return view('modules.profile', ['user' => $userById]);
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
        $imageUrl = $this->imageExistsStatus($request);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageUrl;
        $user->save();
        return redirect()->route('user.profile');
       // return redirect('/product/manage')->with('message', 'Product info updated successfully');

    }
    private function imageExistsStatus($request)
    {
        $userById = User::where('id',$request->id)->first();
        $userImage = $request->file('image');
        // if($userImage ){
        //     // if(isset($userById->image)){
        //     //     $contents = Storage::get($userById->image);
        //     //     unlink($contents);
        //     // }
        //     $name = $userImage->getClientOriginalName();
        //     //Storage::put($name, $userImage);
        //     Storage::put('avatars',$userImage);
        //     //$uploadPath = 'assets/userImage/';
        //     //$userImage->move($uploadPath, $name);
        //     $imageUrl = $name;
        // }

        if($userImage){
            if(isset($userById->image)){
                Storage::delete( public_path('/avatars' . $userById->image));
              //  unlink(public_path('storage/app/public/avatars/'.$userById->image));
            }
            //$name = $userImage->getClientOriginalName();
            $filename = $request->id;
            $extension = $userImage->getClientOriginalExtension();
            $fileNameToStore = $filename.'.'.$extension;            
            $imageUrl = $fileNameToStore;
            $userImage->storeAs('public/avatars',$fileNameToStore);
        }
        else
        {
            $imageUrl = $userById->image;
        }
        return $imageUrl;
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
