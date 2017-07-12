@extends('backend/editor/master')
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
                                    <p class="text-success" data-id="{{$post->id}}" id="pub">Published</p>
                                    @else
                                    <p class="text-warning" data-id="{{$post->id}}" id="unpub">Unpublished</p>
                                    @endif
                                    
                                
                                </td>
                                
                                
                                <td>
                                    <a href="{{url('/post')}}/{{$post->id}}/edit" class="glyphicon glyphicon-check btn btn-warning btn-xs" style="padding-right:20px ">Edit</a> <br>
                                    <form method="POST" action="{{url('/post')}}/{{$post->id}}" />
                                    {{csrf_field()}}
                                    {{ method_field('delete') }}
                                    <button class="glyphicon glyphicon-trash btn btn-danger btn-xs">Delete</button>
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