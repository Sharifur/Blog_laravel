@extends('backend/master')
@section('content')

<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Comments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Messages</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            <tr>
                                
                                <td>Name Of User </td>
                                <td>Email Of User</td>
                                <td>Messages</td>
                                <td>
                                    <button class="glyphicon glyphicon-trash btn btn-danger btn-xs"> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection