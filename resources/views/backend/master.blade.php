<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vougish | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  @include('backend/home/script')
 @include('backend/home/css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('backend/home/header')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('/')}}/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">POSTS</li>
        <li><a href="{{route('admin.post.all')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Post Manage</span></a></li>
        <li class="header">CATEGORY</li>
        <li><a href="{{url('/category')}}"><i class="fa fa-circle-o text-red"></i> <span> Category Manage</span></a></li>
        
<!--        <li class="header">COMMENTS</li>
        <li><a href="{{url('/')}}/comment"><i class="fa fa-circle-o text-yellow"></i> <span>Comment Manage</span></a></li>
        -->
        <li class="header">MESSAGES</li>
        <li><a href="{{url('/')}}/messages"><i class="fa fa-circle-o text-red"></i> <span>Unread Message</span></a></li>
        <li><a href="{{url('/')}}/messagesSeen"><i class="fa fa-circle-o text-yellow"></i> <span>Read Message</span></a></li>
        
        <li class="header">EMAIL SUBSCRIBER</li>
        <li><a href="{{url('/email')}}"><i class="fa fa-circle-o text-red"></i> <span>Email Sub Manage</span></a></li>
        
        <li class="header">PICTURE GALLERY</li>
        <li><a href="picgallery"><i class="fa fa-circle-o text-yellow"></i> <span>Picture Gallery</span></a></li>
        
        <li class="header">SLIDER MANAGE</li>
        <li><a href="{{url('/slider')}}"><i class="fa fa-circle-o text-red"></i> <span>Slider Manage</span></a></li>
      
       <li class="header"></li>
       
        <li class="header">USER MANAGE</li>
         <li><a href="{{route('editor.list')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Editor Manage</span></a></li>
        <li><a href="{{route('users.list')}}"><i class="fa fa-circle-o text-red"></i> <span>Users Manage</span></a></li>
        
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  @include('backend/home/sidebar')
  

</body>
</html>
