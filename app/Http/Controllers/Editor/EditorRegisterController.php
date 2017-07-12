<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor;


class EditorRegisterController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
            'email' => 'required | email',
            'name' => 'required | max:191',
            'password' => 'required | min:6'
        ]);
      
        $admin = new Editor;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->save();
        
        return response()->json();
    }
    public function editorRemove(Request $request){
        
        Editor::find($request->id)->delete();
        return response()->json();
    }
}
