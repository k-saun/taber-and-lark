<?php
	session_start();
	if (!isset($_SESSION['logged_in']) || true !== $_SESSION['logged_in']) {
	  header("Location: /login.php");
	  exit;
	}
	include_once("DAO.php");
	$dao = new DAO();
	$user = $dao->getUser($_SESSION['user_email']);
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
			<?php
				echo "<div>{$user['user_email']}</div>";
			?>
			<a id="logout" href="logout_handler.php">Logout</a>
    	</div>
	</body>
</html>
