<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class MessageController extends Controller
{
    public function index(){
        $unseenm = Contact::where('status','0')->get();
        return view('backend/messagesUnseen', compact('unseenm'));
    }
    public function Seen(){
        $seenm = Contact::where('status','1')->get();
        return view('backend/messagesSeen', compact('seenm'));
    }
    public function delete(Request $request){
        Contact::find($request->id)->delete();
        return response()->json();
    }
    public function messageSeen(Request $request){
        $data = Contact::find($request->id);
        $data->status = "1";
        $data->save();
        return response()->json();
    }
}
