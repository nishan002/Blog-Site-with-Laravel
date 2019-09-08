<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  =  User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name'  =>  'required',
            'email' =>  'required|email',
        ]);

        $user=User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  bcrypt('password'),
        ]);

        $profile=Profile::create([
            'user_id'   =>  $user->id,
            'avatar'    =>  'images/avatars/1.png',
        ]);

        session()->flash('success','Successfully created new user');
        return redirect()->back();
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
        $user = User::findOrFail($id);
        $user->profile->delete();
        $user->delete();
        session()->flash('success','Successfully deleted user');
        return redirect()->back();
    }

    public function admin($id){
        $user = User::findOrFail($id);
        $user->admin = 1;
        $user->save();
        session()->flash('success','Successfully change permission');
        return redirect()->back();
    }

    public function not_admin($id){
        $user = User::findOrFail($id);
        $user->admin = 0;
        $user->save();
        session()->flash('success','Successfully change permission');
        return redirect()->back();
    }
}
