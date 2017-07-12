<?php

namespace App\Http\Controllers;
use App\Post;
use App\Slider;
use App\PicGallery;
use App\Category;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    
    public function index()
    {
       $allpost = Post::where('publicationid','1')->select('posts.id','posts.title','posts.picture','cat.name as cname')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
               ->paginate(12);
       $allposts = Post::select('posts.id','posts.title','posts.picture','cat.name as cname')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
               ->paginate(5);
       $slider = Slider::all();
       $picgallery = PicGallery::all();
       $allCategory = Category::all();
        return view('fontend/home',['allpost'=>$allpost,'slider'=>$slider,'allposts'=>$allposts,'picgallery'=>$picgallery,'allCategory' => $allCategory]);
    }
    public function about(){
        return view('fontend/about');
    }
    public function single($category,$id){
        $posts = Post::select('posts.id', 'posts.categoriesid as cid','posts.user_id','posts.title','posts.picture','posts.tags','posts.created_at','users.name as uname')
        ->where('posts.id',$id)
        ->join('users','users.id','=','posts.user_id')
        ->first();
        $cid = $posts->cid;
        $rposts = Post::select('posts.id','posts.title','posts.picture','cat.name as cname')
                ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->where('categoriesid',$cid)
                ->paginate(4);
        $allposts = Post::select('posts.id','posts.title','posts.picture','cat.name as cname','posts.created_at')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
               ->paginate(10);
        $allcomment = Comment::select('*','users.name as uname')->where(['post_id'=>$id])
                        ->join('users','users.id' ,'=','user_id')
                       ->get();
        
        return view('fontend/single', compact('posts','rposts','allposts','allcomment'));
    }
    public function categorypost($category, $id){
        $allpost = Post::select('posts.id','posts.title','posts.picture','posts.created_at','cat.name as cname')
                ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->where('categoriesid',$id)
                ->paginate(5);
        $allposts = Post::select('posts.id','posts.title','posts.picture','cat.name as cname','posts.created_at')
               ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
               ->paginate(10);
        //return $allpost;
        return view('fontend/categoriesPost', compact('allpost','allposts'));
    }

}
