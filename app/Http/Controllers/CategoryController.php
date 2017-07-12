<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admins');
    }
    public function index()
    {
        $allcat = Category::select('categories.id','categories.name')->get();
        return view('backend/categoryCreate', compact("allcat"));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191|unique:categories'
        ]);
        
        $data = new Category;
        $data->name = $request->name;
        $data->save();
        
        return redirect('category');
    }
    public function cedit(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);
        $data = Category::find($request->id);
            $data->name = $request->name;
            $data->save();

            return response()->json($data);
    }
    public function cdelete(Request $request){
        
      Category::find($request->id)->delete();
        
        return response()->json();
    }
}
