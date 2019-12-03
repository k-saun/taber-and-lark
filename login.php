<?php
  session_start();
  if (isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] == true) {
    header("Location: /profile.php");
    exit;
  }
?>

<html>
  <head>
  	<title>T&L</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="login.js"></script>
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

      <div class="usr form">
        <form id="login-form" class="no-margin" method="post" action="/login_handler.php">
          <div class="split"><label for="form_email">Email</label> <input type="text" name="email" id="form_email"/></div>
          <div class="split"><label for="form_pass">Password</label><input type="password" name="pass" id="form_pass"/></div>
          <div class="split">
            <div><a href="/register.php">Sign up!</a></div>
            <input id="submit" type="submit" value="Sign in"/>
          </div>
          <div class="center-container no-margin"><ul class="no-margin badMessage" id="errors"><li id="email_error">Test</li></ul></div>

          <?php 
            if (isset($_SESSION['message'])) {
              $msgs = $_SESSION['message'];
              echo "<div class=\"center-container no-margin\"><ul class=\"no-margin badMessage\">";
              foreach($msgs as $msg){
                echo "<li>{$msg}</li>";
              }
              echo"</ul></div>";
              unset($_SESSION['message']);
            }
          ?>
        </form>
      </div>
    </div>
	</body>
</html>