@extends("fontend/master")
@section("content")
<style>
    
.Social-btn {
  display: block;
  background: #26313B;
  margin-bottom: 10px;
  color: #fff;
  font-size: 20px;
  padding: 10px;
  width: 47%;
  text-decoration: none;
  transition: .5s;
}
.Social-btn:hover {
  background: #F53F1A;
  color: #fff;
  text-decoration: none;
}
    
</style>
<div class="login-page">

    <div class="account_grid">
        <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
            <h3>NEW CUSTOMERS</h3>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="acount-btn" href="{{route('register')}}">Create an Account</a>
        </div>
        <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
            <h3>REGISTERED CUSTOMERS</h3>
            <p>If you have an account with us, please log in.</p>
            <form method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span>Email Address<label>*</label></span>
                    <input type="email" name="email" value="{{ old('email') }}"> 
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span>Password<label>*</label></span>
                    <input type="password" name="password" > 
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label> <br/>

                <a class="forgot" href="{{ route('password.request') }}">Forgot Your Password?</a>
                <input type="submit" value="Login">
            </form>
            <a href="{{route('facebook')}}" class="Social-btn"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="{{route('google')}}" class="Social-btn"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>	
        <div class="clearfix"> </div>
        
    </div>
</div>
@endsection