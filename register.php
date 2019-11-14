<?php
  session_start();
?>
<html>
  <head>
  <title>T&L</title>
	<link rel="stylesheet" type="text/css" href="/style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/site.webmanifest">
  </head>
    <body>
		<?php include_once("navbar.php") ?>
		<div class="main">
			<div>
		        <form method="post" action="/register_handler.php">
		          <div>Enter Email</div>
		          <div><input type="text" name="email"/></div>
		          <div>Enter Password</div>
		          <div><input type="password" name="pass1"/></div>
		          <div>Confirm Password</div>
		          <div><input type="password" name="pass2"/></div>
		          <div class="center-container"><input type="submit"/></div>
		        </form>
      		</div>
      		
      		<?php   
		        if (isset($_SESSION['message'])) {
		        	$msgs = $_SESSION['message'];
		        	foreach($msgs as $msg){
		        		echo "<div>{$msg}</div>";
		        	}
		        	unset($_SESSION['message']);
		        }
	      	?>
    	</div>
	</body>
</html>