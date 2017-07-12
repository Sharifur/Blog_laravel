@extends('backend/editor/master')
@section('content')
<br/>
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2> Edit Post</h2>
            <h4 class="text-center text-success">{{Session::get('message')}}</h4>
            <form role="form" action="{{url('/post')}}/{{$post->id}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" value="{{$post->title}}"">
                  <p class="text-center text-danger ">{{ $errors->first('title') }}</p>
                </div>
                  <div class="form-group">
                  <label for="desrc">Description</label>
                  <textarea name="desrc" class="form-control" rows="15">
                  @if(file_exists("desrc/post-{$post->id}.txt"))
                    @php echo ViewFile("desrc/post-{$post->id}.txt"); @endphp
                  @endif
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="Tags">Enter Tags Name</label>
                  <input type="text" class="form-control" name="tags" value="{{$post->tags}}">
                </div>
                <div class="form-group">
                  <label for="categoriesid">Select Category</label>
                  <select name="categoriesid">
                      @foreach($allcat as $cat)
                      @if($cat->id == $post->categoriesid)
                      <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                      @else 
                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endif
                      @endforeach
                  </select>
                </div>
                  <div class="form-group">
                  <label for="publicationid">Publication Status</label>
                  <select name="publicationid">
                      @if($post->publicationid != '0')
                      <option value="1">Published</option>
                      @else  
                      <option value="0">Unpublished</option>
                      @endif
                  </select>
                </div>
                  
                <div class="form-group">
                  <label for="picture">Select Picture</label>
                  <input type="file" id="exampleInputFile" name="picture"> <br/>
                  @if(file_exists("images/post/pic-{$post->id}.{$post->picture}"))
                  <img src="{{url('/')}}/images/post/pic-{{$post->id}}.{{$post->picture}}" width="100"/>
                  @endif
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