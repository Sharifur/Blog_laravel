<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\PostValidation;
use App\Post;
use Illuminate\Support\Facades\Auth;


class EditorController extends Controller
{
    public function __construct() {
        $this->middleware('auth:editor');
    }
    public function index(){
        return view('backend/editor/home');
    }
     public function editorcreate() {
        $allcat = Category::Select('categories.id', 'categories.name')->get();
        //return $allcat;
        return view('backend/editor/postCreate', compact('allcat'));
    }
    public function editorpostshow() {
        $eid = Auth::user()->id;
        $allpost = Post::select('posts.id', 'posts.title', 'posts.tags', 'posts.picture', 'posts.publicationid', 'posts.categoriesid', 'cat.name as cname')
                ->join('categories as cat', 'cat.id', '=', 'posts.categoriesid')
                ->where('posts.user_id',$eid)
                ->get();
        return view('backend/editor/postView',['allpost'=>$allpost]);
    }
    public function editorcategoryshow(){
        $allcat = Category::select('categories.id','categories.name')->get();
        return view('backend/editor/categoryCreate', compact("allcat"));
    }
      public function ecedit(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);
        $data = Category::find($request->id);
            $data->name = $request->name;
            $data->save();

            return response()->json($data);
    }
    public function estore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191|unique:categories'
        ]);
        
        $data = new Category;
        $data->name = $request->name;
        $data->save();
        
        return redirect('editor/category');
    }
        public function ecdelete(Request $request){
        
        Category::find($request->id)->delete();
        
        return response()->json();
    }
}
