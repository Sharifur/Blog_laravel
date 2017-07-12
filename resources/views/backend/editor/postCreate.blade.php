@extends('backend/editor/master')
@section('content')
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2> Create A New Post</h2>
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <form role="form" action="{{url('/post')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter Title ">
                  <p class="text-center text-danger ">{{ $errors->first('title') }}</p>
                </div>
                  <div class="form-group">
                  <label for="desrc">Description</label>
                  <textarea name="desrc" class="form-control" rows="15" placeholder="Enter Description"></textarea>
                </div>
                <div class="form-group">
                  <label for="Tags">Enter Tags Name</label>
                  <input type="text" class="form-control" name="tags" value="{{old('tags')}}" id="exampleInputPassword1" placeholder="Enter Tag Name">
                </div>
                <div class="form-group">
                  <label for="categoriesid">Select Category</label>
                  <select name="categoriesid">
                      
                      <option value="0">Choose Category</option>
                      @foreach($allcat as $cat)
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endforeach
                  </select>
                </div>
                  <div class="form-group">
                  <label for="publicationid">Publication Status</label>
                  <select name="publicationid">
                      <option value="0">Unpublished</option>
                      <option value="1">Published</option>
                  </select>
                </div>
                  
                <div class="form-group">
                  <label for="picture">Select Picture</label>
                  <input type="file" id="exampleInputFile" name="picture">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
    
</div>
 @include('backend/tinymce/tinymce')
 

@endsection