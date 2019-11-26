<?php
  session_start();
  header("Location: /shop.php");
?>
<html>
  <head>
    <title>T&L</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/style/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="/images/favicon/site.webmanifest">
  </head>
    <body>

		<?php include_once("navbar.php") ?>
		<div class="main">
			<div id="enter">
        <a href="/shop.php">
  			  <button type="button" >Enter Shop</button>
        </a>
    	</div>
    </div>
	</body>
</html>