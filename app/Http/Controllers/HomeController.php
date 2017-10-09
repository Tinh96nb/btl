<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\File;
use App\Admin;
use App\Category;
class HomeController extends Controller
{
    public function getdashbroad()	
    {
    	$post_count = Post::count();
    	$admin_count = Admin::count();
    	$file_count = File::count();
    	$category_count = Category::count();
    	return view('admin.index',['num_post'=> $post_count,'num_admin'=>$admin_count,'num_file'=>$file_count,'num_cate'=>$category_count]);
    }
}
