@extends('fontend/master')
@section('content')
<div class="contact">
    <div class="main-head-section">

        <h3>Contact Us</h3>

        <div class="contact-map">
<!--            //<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sin!4v1431587453420" width="100%" height="151px" frameborder="0" style="border:0"></iframe>-->
        </div>
    </div>

    <div class="contact_top">

        <div class="col-md-8 contact_left">
            <h4>Contact Form</h4>
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tincidunt dolor et tristique bibendum. Aenean sollicitudin vitae dolor ut posuere.</p>
            @if(Auth::check())
            <form method="POST" action="{{url('/contact')}}">
                <p class="text-success">{{Session::get('message')}}</p>
                {{csrf_field()}}
                <div class="form_details">
                    
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                    
                    <input type="text" class="text" name="name"  placeholder="Name" required=""><br>
                    <p class="text text-danger " >{{ $errors->first('name') }}</p>
                    <input type="text" class="text" name="email"required="" placeholder="Email Address" ><br>
                    <p class="text text-danger " >{{ $errors->first('email') }}</p>
                    <input type="text" class="text" name="subject" required="" placeholder="Subject"><br>
                    <p class="text text-danger " >{{ $errors->first('subject') }}</p>
                    <textarea placeholder="Message" name="message" >Message</textarea><br>
                    <p class="text text-danger " >{{ $errors->first('message') }}</p>
                    <div class="clearfix"> </div>
                    <div class="sub-button">
                        <input type="submit" value="Send message">
                    </div>
                </div>
            </form>
            @else
            <h1>Please Login or Register to Send Us Message</h1><br>
            <a href="{{route('login')}}">Login<a>
                    <br><br>
                    
            <a href="{{route('register')}}">Create An Account<a>
            @endif
        </div>
        <div class="col-md-4 company-right">
            <div class="company_ad">
                <h3>Contact Info</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</span>
                <address>
                    <p>email:<a href="#">DvRobin4@gmail.com </a></p>
                    <p>phone: +88018116665605</p>
                    <p>222 2nd Ave South</p>
                    <p>Saskabush, SK   S7M 1T6</p>
                </address>
            </div>

        </div>	
        <div class="clearfix"> </div>

    </div>
</div>
@endsection
