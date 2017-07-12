<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentValidation;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct() {
//        $this->middleware('auth:admins');
//    }
    public function index()
    {
      return view('backend/comments');
    }

    
    public function store(CommentValidation $request)
    {
        Comment::create($request->all());
        return redirect()->back();
     }

}
