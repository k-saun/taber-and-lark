<?php
  session_start();
?>
<html>
  <head>
  <title>T&L</title>
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="register.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/site.webmanifest">
  </head>
    <body>
		<?php include_once("navbar.php") ?>
		<div class="main">
			<div class="usr form no">
		        <form class="no-margin" method="post" action="/register_handler.php">
		          <div class="center-container">Create User</div>
		          <div class="split"><label for="form_email">Enter Email</label><input type="text" name="email" id="form_email"/></div> 
		          <div class="split"><label for="form_pass1">Enter Password</label><input type="password" name="pass1" id="form_pass1"/></div>
		          <div class="split"><label for="form_pass2">Confirm Password</label><input type="password" name="pass2" id="form_pass2"/></div>
		          	<ul class="no-margin badMessage" id="errors">
		          		<li id="email_error"></li>
		          		<li id="pass_error_1"></li>
		          		<li id="pass_error_2"></li>
		          		<li id="pass_error_3"></li>
		          		<li id="pass_error_4"></li>
		          	</ul>
		          <?php   
			        if (isset($_SESSION['message'])) {
			        	$msgs = $_SESSION['message'];
			        	echo "<div class=\"center-container\"><ul class=\"no-margin badMessage\">";
			        	foreach($msgs as $msg){
			        		echo "<li>{$msg}</li>";
			        	}
			        	echo"</ul></div>";
			        	unset($_SESSION['message']);
			        }
		      	  ?>
		          <div class="center-container"><input id="submit" type="submit"/></div>
		        </form>
      		</div>
    	</div>
	</body>
</html>