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
			<div class="usr form no">
		        <form class="no-margin" method="post" action="/register_handler.php">
		          <div class="center-container">Create User</div>
		          <br>
		          <div class="split"><div>Enter Email</div><input type="text" name="email"/></div> 
		          <div class="split"><div>Enter Password</div><input type="password" name="pass1"/></div>
		          <div class="split"><div>Confirm Password</div><input type="password" name="pass2"/></div>
		          <br>
		          <?php   
			        if (isset($_SESSION['message'])) {
			        	$msgs = $_SESSION['message'];
			        	foreach($msgs as $msg){
			        		echo "<div>{$msg}</div>";
			        	}
			        	unset($_SESSION['message']);
			        }
		      	  ?>
		          <div class="center-container"><input type="submit"/></div>
		        </form>
      		</div>
    	</div>
	</body>
</html>