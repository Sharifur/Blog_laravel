@extends('backend/editor/master')
@section('content')
<section class="content">

      <div class="row">
        <div class="col-lg-3 col-lg-offset-1 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{App\Post::where('user_id',Auth::user()->id)->count()}}</h3>

              <p>You Posted</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">View All Post <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>



    </section>
@endsection