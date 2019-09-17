<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $title = Setting::first()->site_name;
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at','desc')->first();
        $second_post = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $laravel = Category::findOrFail(1);
        $django = Category::findOrFail(3);
        $settings = Setting::first();

        return view('welcome',compact('title','categories','first_post','second_post','third_post','laravel',           'django','settings'));
    }

    public function singlepost($slug){
        $post = Post::where('slug',$slug)->first();
        $next_id = Post::where('id','>', $post->id)->min('id');
        $prev_id = Post::where('id','<', $post->id)->max('id');

        return view('single')
            ->with('post',$post)
            ->with('title', $post->title)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(4)->get())
            ->with('next', Post::find($next_id))
            ->with('prev', Post::find($prev_id));

    }

    public function category($id){
        $category = Category::findOrFail($id);

        return view('category')
            ->with('category',$category)
            ->with('title', $category->name)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(4)->get())
            ->with('tags', Tag::all());
    }

    public function tag($id){
        $tag = Tag::find($id);

        return view('tag')
            ->with('tag', $tag)
            ->with('title', $tag->tag)
            ->with('settings', Setting::first())
            ->with('categories', Category::take(4)->get());
    }
}
