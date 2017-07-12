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
            <h3>PASSWORD RESET REQUEST</h3>
            <p>Please Enter Your User Email Address to Recover Your Password</p>
            @if (session('status'))
            <p class="text text-success" >{{ session('status') }}</p>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{csrf_field()}}
                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span>Email Address<label>*</label></span>
                    <input type="email" name="email" value="{{ old('email') }}"> 
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
                <input type="submit" value="Send Password Reset Link">
            </form>
        </div>	
        <div class="clearfix"> </div>

    </div>
</div>
@endsection