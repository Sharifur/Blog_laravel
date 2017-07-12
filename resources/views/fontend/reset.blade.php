@extends('fontend/master')
@section('content')
 <style>
    .register-top-grid input[type="text"],.register-top-grid input[type="email"], .register-bottom-grid input[type="text"],.register-bottom-grid input[type="email"], .register-top-grid input[type="password"], .register-bottom-grid input[type="password"] {
    border: 1px solid #26313b;
    outline-color: #26313b;
    width: 95%;
    font-size: 1em;
    padding: 0.5em;
}
.register-top-grid div, .register-bottom-grid div {
    width: 48%;
    float: none;
    margin: 10px 0;
}
div.register-bottom-grid {
     margin-top: 0; 
}
</style>
<div class="main-1">
    <div class="register">
        <form method="POST" action="{{ route('password.request') }}"> 
            {{csrf_field()}}
            <div class="register-top-grid">
                <h3>CHANGE YOUR PASSWORD </h3>
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="wow fadeInRight {{ $errors->has('email') ? ' has-error' : '' }}" data-wow-delay="0.4s">
                    <span>Email Address<label>*</label></span>
                    <input type="email" name="email" value="{{ old('email') }}"> <br>
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            </div>
            <div class="register-bottom-grid {{ $errors->has('password') ? ' has-error' : '' }}"><br>
                <div class="wow fadeInLeft" data-wow-delay="0.4s">
                    <span>Password<label>*</label></span>
                    <input type="password" name="password">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
                <div class="wow fadeInRight" data-wow-delay="0.4s">
                    <span>Confirm Password<label>*</label></span>
                    <input type="password" name="password_confirmation">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            </div>

            <div class="clearfix"> </div>
            <div class="register-but">
                <input type="submit" value="Register">
                <div class="clearfix"> </div>

            </div>
        </form>
    </div>
</div>
@endsection