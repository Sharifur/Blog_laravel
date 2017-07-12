
@extends('backend/master')
@section('content')
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2> Add A Picture Gallery Image</h2>
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <form role="form" method="POST" action="{{url('/picgallery')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="url">Post Link </label>
                        <input type="text" id="cname" class="form-control" name="url" value="{{old('url')}}" placeholder="Enter Post Url ">
                        <p class="text-center text-danger ">{{ $errors->first('url') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Picture  </label>
                        <input type="file" id="cname"  name="picture">
                        <p class="text-danger ">{{ $errors->first('picture') }}</p>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" id="submitcat" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <br>
                <br/>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Picture Gallery Images </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Post Url</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allpic as $pic)
                            <tr class="picgall{{$pic->id}}">
                            <td>{{$pic->url}}</td>
                            <td>
                                @if(file_exists("images/picgallery/pic-{$pic->id}.{$pic->picture}"))
                                <img src="{{url('/')}}/images/picgallery/pic-{{$pic->id}}.{{$pic->picture}}" width="100px"/>
                                @else  
                                <img src="{{url('/')}}/images/notfound.jpg" width="100px"/>
                                @endif
                            </td>
                            
                            <input type="hidden" id="cid" value="">
                            <td>
                                <button data-toggle="modal" data-target="#myModal" id="delete" data-id="{{$pic->id}}"   class=" glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4  id="modelTile" ></h4>
                    </div>
                    <div class="modal-body">
                        <h2 id="dosure" class="text-center text-danger"> Do You Want To Delete This ?? </h2>
                        {{csrf_field()}}
                        <input type="hidden" id="id" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="yesdelete" data-dismiss="modal" >Yes Delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script>
        $(document).ready(function(){
           
           $(document).on('click','#delete',function(e){
              $('#id').val($(this).data('id'));
              
           });
           $('.modal-footer').on('click','#yesdelete',function(e){
               $.ajax({
                   type:"post",
                   url:"picgallery/delete",
                   data:{
                       'id':$('#id').val(),
                       '_token':$('input[name=_token]').val(),
                   },
                   success: function(data){
                       $('.picgall'+$('#id').val()).remove();
                   }
                   
               });
           });
           
        });
        </script>
@endsection