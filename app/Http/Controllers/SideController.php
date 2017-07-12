<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderValidation;
use App\Slider;

class SideController extends Controller
{
   public function __construct() {
        $this->middleware('auth:admins');
    }
    public function index(){
        $allslider = Slider::all();
        
        return view('backend/slider',compact('allslider'));
    }
    public function store(SliderValidation $request)
    {
        $picture = $request->picture;
        if($picture){
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
        }
        $data = [
          'title'=>$request->title,
          'url'=>$request->url,
          'picture'=>$ext
        ];
        $id = Slider::create($data)->id;
        $picture->move("images/slider","pic-{$id}.{$ext}");
        
        return redirect('/slider')->with('message','Slider Details Insert Successfull');
    }
    public function slideDelete(Request $request){
        $allslider = Slider::where('id',$request->id)->get();
        foreach($allslider as $slider){
            $old_ext = $slider->picture;
        }
        if(file_exists("images/slider/pic-{$request->id}.{$old_ext}")){
            unlink("images/slider/pic-{$request->id}.{$old_ext}");
        }
        Slider::find($request->id)->delete();
        return response()->json();
    }
}
