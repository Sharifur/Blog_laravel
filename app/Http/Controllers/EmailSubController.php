<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSub;
class EmailSubController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admins')->except('emailsub');
    }
    public function index(){
        $allemail = EmailSub::all();
        return view('backend/emailSub', compact('allemail'));
    }
    public function emailsub(Request $request){
        $this->validate($request, [
            'name'=>'required | unique:email_subs,email'
        ]);
        $data = new EmailSub;
        $data->email = $request->name;
        $data->save();
        
        return response()->json();
    }

    public function emaildelete(Request $request){
        EmailSub::find($request->id)->delete();
        
        return response()->json();
    }

   
}
