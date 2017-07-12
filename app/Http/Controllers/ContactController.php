<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Requests\ContactValidation;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fontend/contact');
    }
    public function store(ContactValidation $request)
    {
        Contact::create($request->all());
        return redirect('/contact')->with('message','Message Has Been Send');
    }
    public function show($id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
