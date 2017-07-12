@extends('fontend/master')
@section('content')
<div class="container">
    <div class="main">
        <div class="error-404 text-center">
            <h1>NO Match Found</h1>
            <p>This Data Is Not In Our Database</p>
            <a class="b-home" href="{{url('/')}}">Back to Home</a>
        </div>
    </div>
    <!-- 404 -->
    @endsection