<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\SearchValidate;
class SearchController extends Controller
{
    
    Public function Search(SearchValidate $request){
        
        $searchitem = $request->search;
        
        $searchresult = Post::Where('title','LIKE','%'.$searchitem.'%')->paginate(5);
        if(count($searchresult) != 0){
            return view('fontend/searchresult', compact('searchresult'));
        } else {
            return view('fontend/404');
        }
        
        //return view('fontend/searchresult');
    }
}
