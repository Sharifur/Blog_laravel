<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PicGallery;
use App\Http\Requests\PicGalleryValidation;

class PicGalleryController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admins');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $allpic = PicGallery::all();
        return view('backend/picGallery', compact('allpic'));
    }
    public function store(PicGalleryValidation $request){
       $picture = $request->picture;
        if($picture){
            $ext = strtolower($picture->getClientOriginalExtension());
            ImageCheck($ext);
        }
        $data = [
          'url'=>$request->url,
          'picture'=>$ext
        ];
        $id = PicGallery::create($data)->id;
        $picture->move("images/picgallery","pic-{$id}.{$ext}");
        
        return redirect('/picgallery')->with('message','Slider Details Insert Successfull');
    }
    public function picDelete(Request $request){
        $pic = PicGallery::where('id',$request->id)->get();
        foreach($pic as $pic){
        $old_ext = $pic->picture;
        };
        if(file_exists("images/picgallery/pic-{$request->id}.{$old_ext}")){
            unlink("images/picgallery/pic-{$request->id}.{$old_ext}");
        };
        PicGallery::find($request->id)->delete();
        return response()->json();
        
    }
}
