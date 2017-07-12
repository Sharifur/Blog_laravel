<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Post;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admins');
    }
    public function index(){
        return view('backend/home');
    }
    public function allpost() {
        $allpost = Post::select('posts.id', 'posts.title', 'posts.tags', 'posts.picture', 'posts.publicationid', 'posts.categoriesid', 'cat.name as cname')
                ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->get();
        return view('backend/postAll',['allpost'=>$allpost]);
    }
    public function postdestroy($id) {
        $allpost = Post::where('id', $id)->first();
        if (file_exists("images/post/pic-{$id}.{$allpost->picture}")) {
            unlink("images/post/pic-{$id}.{$allpost->picture}");
        }
        if (file_exists("desrc/post-{id}.txt")) {
            unlink("desrc/post-{$id}.txt");
        }
        Post::where('id', $id)->delete();
        return redirect(route('admin.post.all'))->with('message', 'Delete Success');
    }
    
    
}
