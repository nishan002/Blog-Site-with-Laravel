<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Post;
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
}
