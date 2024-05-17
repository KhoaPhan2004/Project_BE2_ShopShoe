@extends('admin.admin')

@section('styles')
<style>
     .container{
        background-image: url('../../../public/images/anhnen.png');
        background-size: cover;
        background-position: center;
        color: white;
    }
</style>
@endsection

@section('main')
<?php 
$code = isset($code) ? $code :404;
$title = isset($title) ? $title :'not found';
$message = isset($message) ? $message :'Page not found';
?>
<div class="jumbotron">
    <div class="container">
        <h1>{{$code}},{{$title}}!</h1>
        <p>{{$message}}....</p>
        <p></p>
      
    </div>
</div>

@stop()