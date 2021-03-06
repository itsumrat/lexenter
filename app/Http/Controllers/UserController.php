<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\SignupEmail;
use Response;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('modules.user.index',['users' => $users]);

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
        $this->validate($request,[
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required'
            ]);
        $randpass= Str::random(8);;

        $avatar = 'user.png';
        
        $user = new USER();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($randpass);
        $user->role_id= $request->role_id;
        $user->image = $avatar;
    
        $details = [
            'title' => 'Mail from Lexenter',
            'body' => 'Hi '.$request->name.'!
            Thanks for registering at Lexenter. You can now login to manage your account using the following credentials:
            Email:'.$request->email.'
            Password: '.$randpass];    
    
        \Mail::to($request->email)->send(new SignupEmail($details));
        $user->save();
        return redirect()->route('user.index');
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
        $user = User::where('id', $id)->first();
        return Response::json($user);
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }

    public function storeRole(Request $request)
    {
        
        $this->validate($request,[
            'role_id' => 'required',
            ]);

            $uId = $request->id;
            User::updateOrCreate(['id' => $uId],['role_id' => $request->role_id]);
            return redirect()->route('user.index');

    }
    // public function profile()
    // {
    //     return view('modules.profile');

    // }
}
