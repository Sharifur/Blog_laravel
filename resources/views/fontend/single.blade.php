@extends('fontend/master')
@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1569372003138303";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="content-top">

    <div class="single">
        <div class="single-top">
            @if(file_exists("images/post/pic-{$posts->id}.{$posts->picture}"))
            <img src="{{url('/')}}/images/post/pic-{{$posts->id}}.{{$posts->picture}}" class="img-responsive" alt="">
            @else
            <img src="{{url('/')}}/images/notfound.jpg" class="img-responsive"/>
            @endif
            <br/><br/><br/><br/>
            <h2 class="sin">{{$posts->title}}</h2>
            <p class="sin">
                @if(file_exists("desrc/post-{$posts->id}.txt"))
                @php echo ViewFile("desrc/post-{$posts->id}.txt"); 
                @endphp
                @endif</p>
            <div class="artical-links">
                <ul>
                    <li><small> </small><span>{{ $posts->created_at->diffForHumans() }}</span></li>
                    <li><a href="#"><small class="admin"> </small><span>{{$posts->uname}}</span></a></li>
                    <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
                </ul>
            </div>
            <div style="height: 50px";></div>
            <div class="row">
                @foreach($rposts as $rpost)
                <div class="col-md-3">
                    @if(file_exists("images/post/pic-{$posts->id}.{$posts->picture}"))
                    <img src="{{url('/')}}/images/post/pic-{{$rpost->id}}.{{$rpost->picture}}" class="img-responsive" alt="">
                    @else
                    <img src="{{url('/')}}/images/notfound.jpg" class="img-responsive"/>
                    @endif
                    @php
                    $category = Replace($rpost->cname);
                    $title = Replace($rpost->title);
                    @endphp
                    <div style="height: 20px";></div>
                    <h5><a href="{{route('single.post',[$category,$rpost->id,$title])}}" >{{$rpost->title}}</a></h5>  
                </div>
                @endforeach
            </div>
            @if(Auth::check())
                        <div class="respon">
                <h2>Responses so far</h2>
                <div class="strator">
                    @foreach($allcomment as $comment)
                    <h5>{{$comment->uname}}</h5>
                    <p>{{$comment->created_at->diffForHumans()}}</p>
                    <div class="strator-right">
                        <p >{{$comment->message}}</p>
                    </div>
                    <div class="clearfix"></div>
                    @endforeach
                </div>
                <div class="comment">
                    <h2>Leave a comment</h2>
                    <form  method="post" action="{{route('comment.store')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                        <input type="hidden" name="post_id" value="{{$posts->id}}"/>
                        <input class="{{ $errors->has('name') ? ' has-error' : '' }}" value="{{old('name')}}" type="text" class="textbox" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        <input class="{{ $errors->has('email') ? ' has-error' : '' }}" value="{{old('email')}}" type="text" class="textbox" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                        @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        <input class="{{ $errors->has('website') ? ' has-error' : '' }}" value="{{old('website')}}" type="text" class="textbox" name="website" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}">
                       @if($errors->has('website'))
                       <span class="help-block">
                            <strong>{{$errors->first('website')}}</strong>
                       </span>
                       @endif
                        <textarea class="{{ $errors->has('message') ? ' has-error' : '' }}" value="{{old('message')}}" value="Message:" name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        @if($errors->has('message'))
                            <span class="help-block">
                                <strong>{{$errors->first('message')}}</strong>
                        </span>
                        @endif
                        <div class="smt1">
                            <input type="submit" value="add a comment">
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>
            @endif

        </div>
        <div class="blog-content-right">
            <div class="b-search">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search'; }">
                    <input type="submit" value="">
                </form>
            </div>
            <!--start-twitter-weight-->
            <div class="twitter-weights">
                <h3>Recent Posts</h3>
                <div class="twitter-weight-grid">
                    @foreach($allposts as $posts)
                    <div class="recent-post-box">
                        <div class="blog-grid-left">
                        <a href="">@if(file_exists("images/post/pic-{$posts->id}.{$posts->picture}"))
                        <img src="{{url('/')}}/images/post/pic-{{$posts->id}}.{{$posts->picture}}"  alt="" height="50px" width="50px"> 
                        @endif</a>
                        </div>
                        <div class="blog-grid-right">
                            @php 
                            $category = Replace($posts->cname);
                            $title = Replace($posts->title);
                            @endphp
                            <p><a href="{{route('single.post',[$category,$posts->id,$title])}}" target="_blank">{{$posts->title}}</a></p>
                            <p>Posted  At {{ $posts->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div style="height: 20px;"></div>
                    @endforeach
                </div>
            </div>
            <!--//End-twitter-weight-->
            <!-- start-tag-weight-->
            
            <!---- //End-tag-weight---->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection