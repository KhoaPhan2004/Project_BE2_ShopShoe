
<div>
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
</div>

