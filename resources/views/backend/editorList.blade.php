@extends('backend/master')
@section('content')

<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All User</h3>
                    <p id="admin" class="text text-success" style="display:none;"> New Admin Added Success</p>
                </div>
                <!-- /.box-header -->
                
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($alleditor as $editor)
                         <tr class="item{{$editor->id}}">
                                <td>{{$editor->name}} </td>
                                <td>{{$editor->email}} </td>
                                <td>
                                <button id="makeadmin" data-toggle="modal" data-target="#inbox"  data-id="{{$editor->id}}"> Remove Editor</button>
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
        <h4 class="modal-title">Remove Admin</h4>
      </div>
      <div class="modal-body">
          <input type="text"  id="id"> 
          <p>Are Your Sure To Remove This Editor ?</p> 
      </div>
        {{csrf_field()}}
      <div class="modal-footer">
          <button type="button" class="btn btn-success" id="confirm" data-dismiss="modal">Remove Admin</button>
          <button type="button" class="btn btn-dropbox" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function(){
        $(document).on('click','#makeadmin',function(e){
            $('#id').val($(this).data('id'));
        });
        
        $('.modal-footer').on('click', '#confirm', function (e) {
                    $.ajax({
                        type: "post",
                        url: "{{route('editor.remove')}}",
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