
@extends('backend/editor/master')
@section('content')
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2> Create A New Category</h2>
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <form role="form" method="POST" action="{{route('editor.cat.add')}}">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Category Name</label>
                        <input type="text" id="cname" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter Category Name ">
                        <p class="text-center text-danger ">{{ $errors->first('name') }}</p>
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
                        <h3 class="box-title">Category Name</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allcat as $cat)
                                <tr class="item{{$cat->id}}" id="foritem">

                                    <td id="cname">{{$cat->name}}</td>
                            <input type="hidden" id="cid" value="{{$cat->id}}">
                            <td>

                                <button  data-toggle="modal" data-target="#myModal" id='edit' data-id="{{$cat->id}}" data-name="{{$cat->name}}" class="glyphicon glyphicon-check btn btn-info btn-xs"> Edit</button>
                                <button data-toggle="modal" data-target="#myModal" id="delete" data-id="{{$cat->id}}"   class=" glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
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
                        <input type="text" class="form-control" id="addItem" placeholder="Enter Item"/>
                        <h2 id="dosure" class="text-center text-danger"> Do You Want To Delete This Category ?? </h2>
                        {{csrf_field()}}
                        <input type="hidden" id="id" />

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="yesdelete" data-dismiss="modal" >Yes Delete</button>
                        <button type="button" class="btn btn-success" id="saveChange" data-dismiss="modal">Save changes</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <script>
            $(document).ready(function () {
               
//               $('.box-footer').on('click','#submitcat',function(){
//                   $.ajax({
//                      type: 'post',
//                      url: "editor/category/add",
//                      data:{
//                          'name':$('#cname').val(),
//                          '_token':$(input['name=_token']).val(),
//                      },
//                     success: function (data) {
//                            $('.item' + data.id).append("<tr class='item" + data.id + "'>\n\
//                    <td>" + data.name + "</td>\n\<td>\n\
//<button data-toggle='modal' data-target='#myModal' id='edit' class='glyphicon glyphicon-check btn btn-info btn-xs' data-id='" + data.id + "' data-name='" + data.name + "'> Edit</button> \n\
//<button data-toggle='modal' data-target='#myModal' id='delete' class='glyphicon glyphicon-trash btn btn-danger btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' > Delete</button>\n\
//</td></tr>");
//                        }
//                   });
//               });

                $(document).on('click', '#edit', function () {
                    $('#modelTile').text('Edit Category');
                    $('#addItem').show();
                    $('#saveChange').show();
                    $('#addItem').val($(this).data('name'));
                    $('#id').val($(this).data('id'));
                    $('#dosure').hide();
                    $('#yesdelete').hide();


                });

                $(document).on('click', '#delete', function () {
                    $('#modelTile').text('Delete Category');
                    $('#addItem').hide();
                    $('#saveChange').hide();
                    $('#id').val($(this).data('id'));
                    $('#dosure').show();
                    $('#yesdelete').show();
                });
                //Edit Funcion start from here
                $('.modal-footer').on('click', '#saveChange', function () {
                    $.ajax({
                        type: 'post',
                        url: "editor/category/edit",
                        data: {
                            'id': $('#id').val(),
                            'name': $('#addItem').val(),
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function (data) {
                            $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'>\n\
                    <td>" + data.name + "</td>\n\<td>\n\
<button data-toggle='modal' data-target='#myModal' id='edit' class='glyphicon glyphicon-check btn btn-info btn-xs' data-id='" + data.id + "' data-name='" + data.name + "'> Edit</button> \n\
<button data-toggle='modal' data-target='#myModal' id='delete' class='glyphicon glyphicon-trash btn btn-danger btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' > Delete</button>\n\
</td></tr>");
                        }
                    });


                });
                //Delete function  Start from Here 
                $('.modal-footer').on('click', '#yesdelete', function () {
                    $.ajax({
                        type: 'post',
                        url: "category/delete",
                        data: {
                            'id': $('#id').val(),
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function (data) {
                            $('.item' + $('#id').val()).remove();
                        }
                    });
                });
            });
        </script>
        @endsection
