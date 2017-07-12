@extends('backend/master')
@section('content')

<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Post</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Picture</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allpost as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>
                                @if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                                <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}" width="100"/>
                                @else
                                <img src="{{url('/')}}/images/notfound.jpg" width="100"/>
                                @endif
                                </td>
                                <td>{{$post->cname}}</td>
                                <td>{{$post->tags}}</td>
                                <td>
                                    @if($post->publicationid !=0)
                                    <p class="text-success">Published</p>
                                    @else
                                    <p class="text-warning">Unpublished</p>
                                    @endif
                                </td>
                                
                                
                                <td>
                                    @php 
                                    $category = Replace($post->cname);
                                    $title = Replace($post->title);
                                    @endphp
                                    <a href="{{route('single.post',[$category,$post->id,$title])}}" target="_blank" class="btn btn-primary btn-xs">View Post</a> <br><br>
                                    <form method="POST" action="{{route('admin.post.delete',$post->id)}}" />
                                    {{csrf_field()}}
                                    <button class=" btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection