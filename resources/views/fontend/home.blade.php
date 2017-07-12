@extends('fontend/master')
@section('content')
<style>
    .rslides img {
        height: 450px;
    }
    .recent-post-box{
        height: 100px;
        width: 220px;
    }
</style>
<div class="col-md-9 bann-right">
    <!-- banner -->
    <div class="banner">		
        <div class="header-slider">
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider">
                        @foreach($slider as $slider)
                        <li>
                            
                            @if(file_exists("images/slider/pic-{$slider->id}.{$slider->picture}"))
                           <a href="#"> <img src="{{url('/')}}/images/slider/pic-{{$slider->id}}.{{$slider->picture}}" class="img-responsive"  alt=""></a>
                            @endif 
                            <div class="caption">
                                <a href="{{$slider->url}}" target="_blank"><h3>{{$slider->title}}</h3></a>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- banner -->	
    <!-- nam-matis -->
    <div class="nam-matis">


        @php $c=1; @endphp
        @foreach($allpost as $post)
        @if($c%3==1)
        <div class="nam-matis-top">
            @endif
            <div class="col-md-4 nam-matis-1">
                @if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}"  alt="" height="200px" width="250px"/> 
                @endif
                @php 
                $category = Replace($post->cname);
                $title = Replace($post->title);
                @endphp
                <h3 style="padding-bottom: 30px"><a href="{{route('single.post',[$category,$post->id,$title])}}" >{{$post->title}}</a></h3>
            </div>
            @if($c%3==0)
        </div>
        <div class="clearfix"> </div>
        @endif
        @php $c++;@endphp
        @endforeach
        <div class="clearfix"> </div>

    </div>
    <!-- nam-matis -->	
</div>
<div class="col-md-3 bann-left">
    <div class="b-search">
        <form method="Post" action="{{url('/search')}}">
            {{csrf_field()}}

            <input type="text" name="search" placeholder="Seach Here"/>
            <input type="submit" value=""/>
        </form>
        <p class="text text-danger">{{ $errors->first('search') }}</p>
    </div>
    <h3>Recent Posts</h3>
    <div class="blo-top">

        <div class="blog-grids">
            @foreach($allposts as $post)
            <div class="recent-post-box">
                <div class="blog-grid-left">
                    <a href="">@if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                        <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}"  alt="" height="50px" width="50px"> 
                        @endif</a>
                </div>
                <div class="blog-grid-right">
                    @php 
                    $category = Replace($post->cname);
                    $title = Replace($post->title);
                    @endphp
                    <p><a href="{{route('single.post',[$category,$post->id,$title])}}">{{$post->title}}</a></p>
                </div>
                <div class="clearfix"> </div>
            </div>
            @endforeach
        </div>

    </div>
    <h3>Categories</h3>
    <div class="blo-top">
        @foreach($allCategory as $category)
        @php 
        $cname = $category->name;
        $cid = $category->id;
        @endphp
        <li><a href="{{route('category.post',[$cname,$cid])}}">{{$category->name}}</a></li>
        
        @endforeach
    </div>
    <h3>Newsletter</h3>

    <div class="blo-top">
        <form>
            {{csrf_field()}}
            <p class="text-success" style="display:none;" id="emailsuccess">Thanks For Subscribe</p>
            <p class="text-danger" style="display:none;" id="emailfailed">Give An Email For Subscribe</p>
            <input type="email" id="emailadd" class="form-control" placeholder="email" required="1">
            @if(Session::has('email'))
            <p>{{$error->first('email')}}</p>
            @endif
            <br/>
            <input type="submit" class="btn btn-info"  id="subbtn" value="Subscribe">          
        </form>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"> </div>
<div class="fle-xsel">
    <ul id="flexiselDemo3">
        @foreach($picgallery as $pic)
        <li>
            <a href="#">
                <div class="banner-1">
                    @if(file_exists("images/picgallery/pic-{$pic->id}.{$pic->picture}"))
                    <a href="{{$pic->url}}" target="_blank"><img src="{{url('/')}}/images/picgallery/pic-{{$pic->id}}.{{$pic->picture}}"  alt="" height="100px" width="150px"> </a>
                    @endif
                </div>
            </a>
        </li>	
        @endforeach
    </ul>

    <script type="text/javascript">

        $('#subbtn').click(function (e) {
            var email = $('#emailadd').val();
            
            if(email == ""){
                $('#emailfailed').show('400');
            }else{
                 $.ajax({
                type: "POST",
                url: "email/add",
                data: {
                    'name': $('#emailadd').val(),
                    '_token': $('input[name=_token]').val(),
                },
            });
                    $('#subbtn').val('Unsubscribe'),
                    $('#subbtn').removeClass('btn-info'),
                    $('#subbtn').addClass('btn-danger'),
                    $('#emailsuccess').show(400),
                    $('#emailfailed').hide('400')
                
            }
        });

        $(window).load(function () {

            $("#flexiselDemo3").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="{{url('/')}}/fontend/js/jquery.flexisel.js"></script>
    <div class="clearfix"> </div>
</div>

@endsection