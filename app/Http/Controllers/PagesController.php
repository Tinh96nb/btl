<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\File;
use App\Tag;
use App\Admin;

class PagesController extends Controller
{
    public function getindex()
    {
        $cates = Category::where('name','!=','video')->get();
        $videos = Category::where('name','=','video')->get();
        return view('news.pages.home',['cates'=>$cates,'videos'=>$videos]);
    }
    public function getCategory($slug)
    {
        $cate = Category::where('slug', $slug)->first();
        if(count($cate)==0 || count($cate->posts)==0){
            return view('news.pages.category',['key'=>$slug]);
        } else 
    	return view('news.pages.category',['cate'=>$cate]);
    }
    public function getPost($slug)
    {
    	$post = Post::where('status',1)->where('slug', $slug)->first();
        if(count($post)==0){
            return view('news.pages.singlepost',['key'=>$slug]);
        } else
        {
            $post->view = $post->view + 1;
            $post->save();
            return view('news.pages.singlepost',['post'=>$post]);
        }
    }
    public function getTag($key)
    {
    	$tag = Tag::where('name', $key)->first();
        if(count($tag)==0 || count($tag->posts)==0){
            return view('news.pages.tag',['key'=>$key]);
        } else 
        return view('news.pages.tag',['tag'=>$tag]);
    }
    public function getSearch(Request $request)
    {
        $key= $request->input('key');
    	$posts = Post::where('status',1)->where('title', 'like', '%'.$key.'%')->get();
        return view('news.pages.search',['posts'=>$posts,'key'=>$key]);
    }
    public function getAuthor($user)
    {
        $author = Admin::where('name',$user )->first();
        if(count($author)==0 || count($author->posts)==0){
            return view('news.pages.author',['key'=>$user]);
        } else 
        return view('news.pages.author',['author'=>$author]);
    }
    public function getContact()
    {
    	
    }
}
