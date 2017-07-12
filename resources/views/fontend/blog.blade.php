@extends('fontend/master')
@section('content')
<div class="blog">

    <div class="blog-content">
        <div class="blog-content-left">
            <div class="blog-articals">
                @foreach($allpost as $post)
                                @php 
                                $category = Replace($post->cname);
                                $title = Replace($post->title);
                                @endphp
                <div class="blog-artical">
                    <div class="blog-artical-info">
                        <div class="blog-artical-info-img">
                            <a href="">
                                @if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                                <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}"  alt="" height="400px"> 
                                @endif
                            </a>
                        </div>
                        <div class="blog-artical-info-head">
                            <h2><a href="{{route('single.post',[$category,$post->id,$title])}}">{{$post->title}}</a></h2>
                            <h6>{{$post->created_at->diffForHumans()}} <a href="#">{{$post->uname}}</a></h6>

                        </div>
                        <div class="blog-artical-info-text">
                            <p>
                                
                                @if(file_exists("desrc/post-{$post->id}.txt"))
                                {!! substr( ViewFile("desrc/post-{$post->id}.txt") ,0,random_int(300,500))."...."!!}
                                <a class='readmorebtn' href="{{route('single.post',[$category,$post->id,$title])}}">Read More</a>
                                @endif</p>

                        </div>
                        <div class="artical-links">
                            <ul>
                                <li><small> </small><span>{{$post->created_at->diffForHumans()}}</span></li>
                                <li><a href="#"><small class="admin"> </small><span>{{$post->uname}}</span></a></li>
                                <li><a href="{{route('single.post',[$category,$post->id,$title])}}"><small class="posts"> </small><span>View posts</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                @endforeach
            </div>
            <div class="row text-center">
                {{$allpost->links()}}
            </div>
        </div>

        <div class="blog-content-right">
            <div class="b-search">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {}">
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