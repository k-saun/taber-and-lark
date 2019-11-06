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

		<?php include_once("navbar.php");?>
      
		<div class="main">

      <div>
        <form method="post" action="/login_handler.php">
          <div>Email</div>
          <div><input type="text" name="user_email"/></div>
          <div>Password</div>
          <div><input type="password" name="password"/></div>
          <div class="center-container"><input type="submit"/></div>
          <div class="center-container">
            <a href="/register.php">Sign up!</a>
          </div>
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