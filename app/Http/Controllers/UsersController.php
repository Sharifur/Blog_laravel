<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Editor;

class UsersController extends Controller
{
    public function index(){
        $alluser = User::all();
        return view('backend/usersList', compact('alluser'));
    }
    public function editorIndex(){
        $alleditor = Editor::all();
                
        return view('backend/editorList', compact('alleditor'));
    }
}
