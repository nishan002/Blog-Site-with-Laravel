<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0){
            session::flash('info','Create a category first');

            return redirect()->back();
        }
        return view('admin.posts.create',compact('categories'));
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
            'title'         =>  'required',
            'featured'      =>  'required|image',
            'content'       =>  'required',
            'category_id'   =>  'required',
        ]);

        $file = $request->featured;
        $name = time() . $file->getClientOriginalName();
        $file->move('images/post', $name);

        $post = Post::create([
            'title'         =>  $request->title,
            'featured'      =>  "images/post/" . $name,
            'content'       =>  $request->content,
            'category_id'   =>  $request->category_id,
            'slug'          =>  str_slug($request->title),
        ]);

        Session::flash('success','Post has been created successfully');
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
        $post = Post::all();
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
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
        $this->validate($request,[
            'title'         =>  'required',
            'featured'      =>  'required|image',
            'content'       =>  'required',
            'category_id'   =>  'required',
        ]);

        $file = $request->featured;
        $name = time() . $file->getClientOriginalName();
        $file->move('images/post', $name);

        $post = Post::update([
            'title'         =>  $request->title,
            'featured'      =>  "images/post/" . $name,
            'content'       =>  $request->content,
            'category_id'   =>  $request->category_id,
            'slug'          =>  str_slug($request->title),
        ]);

        Session::flash('success','Post has been created successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        session()->flash('success','your post just in trash');
        return redirect()->back();
    }

    public function trash(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash',compact('posts'));
    }

    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();
        session()->flash('success', 'The post has been successfully deleted');
        return redirect()->back();
    }
}
