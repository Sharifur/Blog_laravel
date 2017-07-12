@extends('fontend/master')
@section('content')
<div class="blog">

    <div class="blog-content">
        <div class="blog-content-left">
            <div class="blog-articals">
                @foreach($searchresult as $post)
                <div class="blog-artical">
                    <div class="blog-artical-info">
                        
                        <div class="blog-artical-info-head">
                            <h2><a href="">{{$post->title}}</a></h2>
                            <h6>{{$post->created_at->diffForHumans()}} <a href="#">{{$post->uname}}</a></h6>
                        </div>
                        <div class="blog-artical-info-img">
                            <a href="">
                                @if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                                <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}"  alt="" height="400px"> 
                                @endif
                            </a>
                        </div>
                        <div class="blog-artical-info-text">
                            <p>
                            @if(file_exists("desrc/post-{$post->id}.txt"))
                            {!! substr( ViewFile("desrc/post-{$post->id}.txt") ,0,random_int(1000,1200))."...."!!}
                            <a class='readmorebtn' href="{{url('/')}}/{{Replace($post->cname)}}/{{$post->id}}/{!!Replace($post->title)!!}">Read More</a>
                            @endif</p>
                            
                        </div>
                        <div class="artical-links">
                            <ul>
                                <li><small> </small><span>june 14, 2013</span></li>
                                <li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
                                <li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
                                <li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
                                <li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                @endforeach
            </div>
            {{$searchresult->links()}}
        </div>
        
        <div class="blog-content-right">
            <div class="b-search">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </form>
            </div>
            <!--start-twitter-weight-->
            <div class="twitter-weights">
                <h3>Tweet Widget</h3>
                <div class="twitter-weight-grid">
                    <h4><span> </span>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
                    <i><a href="#">2 days ago</a></i>
                </div>
                <div class="twitter-weight-grid">
                    <h4><span> </span>John Doe</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
                    <i><a href="#">2 days ago</a></i>
                </div>
                <a class="twittbtn" href="#">See all Tweets</a>
            </div>
            <!--//End-twitter-weight-->
            <!-- start-tag-weight-->
            <div class="b-tag-weight">
                <h3>Tags Weight</h3>
                <ul>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">consectetur</a></li>
                    <li><a href="#">dolore</a></li>
                    <li><a href="#">aliqua</a></li>
                    <li><a href="#">sit amet</a></li>
                    <li><a href="#">ipsum</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">consectetur</a></li>
                    <li><a href="#">dolore</a></li>
                    <li><a href="#">aliqua</a></li>
                    <li><a href="#">sit amet</a></li>
                    <li><a href="#">ipsum</a></li>
                </ul>
            </div>
            <!---- //End-tag-weight---->
        </div>
        <div class="clearfix"> </div>

    </div>
</div>
@endsection