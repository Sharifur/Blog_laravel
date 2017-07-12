
@extends('backend/master')
@section('content')
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2> Add A Slider Image</h2>
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <form role="form" method="POST" action="{{url('/slider')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="url">Post Link </label>
                        <input type="text" id="cname" class="form-control" name="url" value="{{old('url')}}" placeholder="Enter Post Url ">
                        <p class="text-center text-danger ">{{ $errors->first('url') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Slider Title</label>
                        <input type="text" id="cname" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter Slider Title ">
                        <p class="text-center text-danger ">{{ $errors->first('title') }}</p>
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
                        <h3 class="box-title">Slider Images </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Post Url</th>
                                    <th>Slider Title</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allslider as $slider)
                            <tr class="item{{$slider->id}}">
                            <td>{{$slider->url}}</td>
                            <td>{{$slider->title}}</td>
                            <td>
                                @if(file_exists("images/slider/pic-{$slider->id}.{$slider->picture}"))
                                <img src="{{url('/')}}/images/slider/pic-{{$slider->id}}.{{$slider->picture}}" width="100"/>
                                @else
                                <img src="{{url('/')}}/images/slider/pic-{{$slider->id}}.{{$slider->picture}}" width="100"/>
                                @endif
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#myModal" id="delete" data-id="{{$slider->id}}"   class=" glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
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
                        <h4 id="modelTile" ></h4>
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
                $('#modelTile').text('Delete Slider Picture');
                $('#id').val($(this).data('id'));
            });
            $('.modal-footer').on('click','#yesdelete',function(e){
               $.ajax({
                  type: "POST", 
                  url: "slider/delete",
                  data:{
                    'id':$('#id').val(),
                    '_token':$('input[name=_token]').val(),
                  },
                  success:function(data){
                      $('.item'+$('#id').val()).remove();
                  },
               }); 
            });
        });
        </script>
        @endsection