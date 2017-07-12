<?php

namespace App\Http\Controllers\Editor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class EditorLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:editor')->except('logout');
    }
    public function showLoginForm(){
        return view('backend/editor/login');
    }
   public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('editor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect(route('editor.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'))->with('msg','User Eamil Or Password Did Not Matched');
    }
   public function logout(){
       Auth::guard('editor')->logout();
       return redirect('/editor/login');
   }
}
