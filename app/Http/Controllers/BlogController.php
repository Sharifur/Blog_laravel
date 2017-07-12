<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        $allpost = Post::select('posts.id','posts.user_id','posts.title','posts.picture','posts.created_at','cat.name as cname','users.name as uname')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->join('users','users.id','=','posts.user_id')
               ->paginate(3);
        $allposts = Post::select('posts.id','posts.title','posts.picture','cat.name as cname','posts.created_at')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
               ->paginate(10);
        return view('fontend/blog',['allpost' => $allpost,'allposts'=>$allposts]);
    }
}
