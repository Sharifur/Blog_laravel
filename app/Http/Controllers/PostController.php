<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostValidation;
use App\Category;
use App\Post;
use App\Slider;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {
public function __construct() {
        $this->middleware('auth:editor')->except('index');
    }
    public function index() {
        $allpost = Post::select('posts.id', 'posts.title', 'posts.tags', 'posts.picture', 'posts.publicationid', 'posts.categoriesid', 'cat.name as cname')
                ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->get();
        return view('backend/postView',['allpost'=>$allpost]);
    }

    public function create() {
        $allcat = Category::Select('categories.id', 'categories.name')->get();
        //return $allcat;
        return view('backend/postCreate', compact('allcat'));
    }
   

    public function store(PostValidation $request) {
        $picture = $request->picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
        }
        $data = [
            'title' => $request->title,
            //'description' => $request->desrc,
            'tags' => $request->tags,
            'categoriesid' => $request->categoriesid,
            'user_id' => $request->user_id,
            'publicationid' => $request->publicationid,
            'picture' => $ext
        ];

        $pid = Post::create($data)->id;
        $picture->move("images/post", "pic-{$pid}.{$ext}");
        NewFile("desrc/post-{$pid}.txt", $request->desrc);
        return redirect(route('editor.post.create'))->with('message', 'Post Created Success');
    }

    public function show($id) {
        return "I am for  Show single post per Page";
    }

    public function edit($id) {
        $allcat = Category::Select('categories.id', 'categories.name')->get();
        $post = Post::where('id', $id)->first();
        return view('backend/postEdit', ['allcat' => $allcat, 'post' => $post]);
    }

    public function update(Request $request, $id) {
        $allpost = Post::where('id', $id)->first();
        $old_ext = $allpost->picture;
        $picture = $request->picture;
        if ($picture) {
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
            if ($ext == "") {
                $ext = $old_ext;
            } else {
                if (file_exists("images/post/pic-{$id}.{$allpost->picture}")) {
                    unlink("images/post/pic-{$id}.{$allpost->picture}");
                }
                $picture->move("images/post", "pic-{$id}.{$ext}");
            }
        }else{
            $ext = $old_ext;
        }
        
        $desrc = $request->desrc; 
        if($desrc){
            if (file_exists("desrc/post-{id}.txt")) {
            unlink("desrc/post-{$id}.txt");
            }
            NewFile("desrc/post-{$id}.txt", $request->desrc);
        }
        
         $data = [
            'title' => $request->title,
            //'description' => $request->desrc,
            'tags' => $request->tags,
            'categoriesid' => $request->categoriesid,
            'user_id' => $request->user_id,
            'publicationid' => $request->publicationid,
            'picture' => $ext
        ];
//            return $data;
         Post::where('id',$id)->update($data);
        return redirect(route('editor.post.index'));
    }

    public function destroy($id) {
        $allpost = Post::where('id', $id)->first();
        if (file_exists("images/post/pic-{$id}.{$allpost->picture}")) {
            unlink("images/post/pic-{$id}.{$allpost->picture}");
        }
        if (file_exists("desrc/post-{id}.txt")) {
            unlink("desrc/post-{$id}.txt");
        }
        Post::where('id', $id)->delete();
        return redirect(route('editor.post.index'))->with('message', 'Delete Success');
    }

}
