@extends('backend/master')
@section('content')

<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All seen Messages</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($seenm as $seen)
                         <tr class="item{{$seen->id}}">
                                <td>{{$seen->subject}} </td>
                                <td>
                                <button id="read" data-toggle="modal" data-target="#inbox" class=" glyphicon glyphicon-inbox btn btn-info btn-xs" data-id="{{$seen->id}}" data-name="Name :: {{$seen->name}}" data-subject="Subject :: {{$seen->subject}}" data-email=" Email :: {{$seen->email}}" data-message=" Message :: {{$seen->message}}"> Read</button>
                                <button id="delete"  data-toggle="modal" data-target="#inbox" data-id="{{$seen->id}}" class="glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
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
<div id="inbox" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Read Full Message</h4>
      </div>
      <div class="modal-body">
          <p id="name"></p>
          <p id="subject"></p>
          <p id="email"></p>
           <p id="message"></p>
           
           <p id="sure" class="text text-danger text-center">  </p>
           <input type="hidden" id="id"/>
      </div>
        {{csrf_field()}}
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="yesdelete" data-dismiss="modal" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $(document).on('click','#read',function(e){
            $('#name').text($(this).data('name'));
            $('#email').text($(this).data('email'));
            $('#message').text($(this).data('message'));
            $('#subject').text($(this).data('subject'))
            $('#yesdelete').hide();
        });
        $(document).on('click','#delete',function(e){
            $('#id').val($(this).data('id'));
            $('#name').hide();
            $('#email').hide();
            $('#message').hide();
            $('#yesdelete').show()
            $('#sure').text('Area You Sure To delete This Message ??');
        });
        
        $('.modal-footer').on('click', '#yesdelete', function (e) {
                    $.ajax({
                        type: "post",
                        url: "message/delete",
                        data: {
                            'id': $('#id').val(),
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function (data) {
                            $('.item'+$('#id').val()).remove();
                        }
                    });
                });
    });
</script>
@endsection