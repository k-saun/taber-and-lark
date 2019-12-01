<?php
  session_start();
  include_once("DAO.php");
  $dao = new DAO();
  if (!empty($_GET)) {
    $id = $_GET['item_id'];
  }
  $item = $dao->getItem($id);
?>

<html>
  <head>
	  <title>T&L - <?php echo"{$item['item_name']}"; ?> </title>
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
        <div class="item-image-and-checkout">
          <?php
          $price = number_format($item['item_price'], 2,'.', ',');
            echo "<div class=\"center-container\">
                    <img src=\"{$item['item_img']}\"> 
                  </div> 
                  <div>
                    <p>{$item['item_name']}</p>
                    <p>\${$price}</p>
                  </div>";
          ?>
          </div>
        </div>
      </div>
	</body>
</html>