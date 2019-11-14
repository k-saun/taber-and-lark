<?php
  session_start();
  include_once("DAO.php");
  $dao = new DAO();
  if (!empty($_GET)) {
    $id = $_GET[];
  }
  $item = $dao->getItem($id);
?>

<html>
  <head>
	 <title>T&L - Generic Item Name</title>
	 <link rel="stylesheet" type="text/css" href="/style/style.css">
  </head>
    <body>
		  <?php include_once("navbar.php") ?>
  		<div class="main">
        <div id="item-image-and-checkout">
          <div class="center-container">
          <?php
            echo "<img src=\"{$item['item_img']}\" 
                  </div> 
                      <div class=\"center-container\">
                       <p>{$item['item_name']}</p>
                  <p>{$item['item_price']}</p>"
          ?>
          </div>
        </div>
      </div>
	</body>
</html>