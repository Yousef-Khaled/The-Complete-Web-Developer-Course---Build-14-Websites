<?php

  if ($_POST['submit'])
  {
    if ($_POST['name'] == "")
    {
      $msg = "Enter your name.<br />";
    }
    if ($_POST['mail'] == "")
    {
      $msg .= "Enter your mail.<br />";
    }
    if ($_POST['comment'] == "")
    {
      $msg .= "Enter a comment.";
    }

    if ($msg)
    {
      $final = '<div class = "alert alert-danger">'.$msg.'</div>';
    }
    else{

      if (mail("yousef.enkidu0@gmail.com", "massage from website!", 'name: '.$_POST['name'].'<br />From: '.$_POST['mail'].'<br />'.$_POST['comment']) )
      {
        $final = '<div class = "alert alert-success">Form Submitted</div>';
      }
      else{
        $msg = "error sending the mail.";
        $final = '<div class = "alert alert-danger">'.$msg.'</div>';
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mail Form</title>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
    .con {
    	border: 1.25px solid grey;
    	border-radius: 10px; 
    	margin-top: 10px; 
      padding: 20px;
    }
    .head{
    	color: grey;
    	margin-left: 30%; 
    }
    .mid{
      margin-left: 41%; 
    }
    </style>


  </head>
  <body>

  <div class = "container">
  	<div class = "row">
  		<div class="col-md-6 col-md-offset-3 con">
  			<h1 class="head">My Mail Form</h1>
    <?php
    echo $final;
     ?>
  	  <form method="post">
  			<div class="form-group">
  				<label for="name">Your Name</label>
  				<input type="text" name="name" class="form-control" placeholder="Your Name">
  			</div>

  			<div class="form-group">
  				<label for="mail">Your Mail</label>
  				<input type="email" name="mail" class="form-control" placeholder="Your Mail">
  			</div>

  			<div class="form-group">
  				<label for="comment">Your Comment</label>
  				<textarea class="form-control" name="comment" style="height:100px;"></textarea>
  			</div>
        <div class="mid">
  			<input type="submit" name="submit" class="btn btn-lg">
        </div>
  			</form>


  		</div>
 
  	</div>
  </div>


  </body>
  <script type="text/javascript">
    
  </script>
</html>