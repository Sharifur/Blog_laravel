@extends('backend/master')
@section('content')

<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Email Subscriber</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allemail as $email)
                            <tr class="email{{$email->id}}"> 
                                <td>{{$email->email}}</td>
                                <td>
                                    <button id="delete" data-toggle="modal" data-target="#myModal" data-id="{{$email->id}}" class="glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 id="modelTile"></h4>
                    </div>
                    <div class="modal-body">
                        <h2 id="dosure" class="text-center text-danger"> Do You Want To Delete This Category ?? </h2>
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
       $('#modelTile').text('Delete Your Email Subscriber');
       $('#dosure').text('Do You Want To Delete This Email ???');
       $('#id').val($(this).data('id'));
   });
   $('.modal-footer').on('click','#yesdelete',function(e){
       $.ajax({
          type:"post",
          url:"email/delete",
          data:{
              'id':$('#id').val(),
              '_token': $('input[name=_token]').val(),
          },
          success: function(data){
            $('.email'+$('#id').val()).remove();  
          },
       });
   });
   
});
</script>
@endsection