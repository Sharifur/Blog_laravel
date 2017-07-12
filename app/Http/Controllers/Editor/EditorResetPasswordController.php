<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class EditorResetPasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

    public function __construct() {
        $this->middleware('guest:editor');
    }

    protected function guard() {
        return Auth::guard('editor');
    }

    protected function broker() {
        return Password::broker('editor');
    }

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/editor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showResetForm(Request $request, $token = null) {
       
        return view('backend/editor/emailReset')->with(
                        ['token' => $token]
        );
    }

}
