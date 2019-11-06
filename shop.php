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
    	<?php 
        include_once("DAO.php");

        $dao = new DAO();
        $items = $dao->getShopFront();
        $num_rows = $items->rowCount();
        $item_html;

        $i = 0;
        foreach($items as $item){
          $item_html[$i] = "<a href='product.php?item_id={$item['item_url']}''>" .
                  "<img src=\"{$item['item_img']}\">" .
                "</a>";
          $i++;
        }

        echo "<div class=\"item-row\"><div class=\"item-column left\">";

        $i = 0;
        for($i; $i < ($num_rows/2); $i++){
          echo $item_html[$i];
        }
        echo "</div>";
        echo "<div id=\"right\" class=\"item-column right\">";

        for($i; $i < $num_rows; $i++){
          echo $item_html[$i];
        }
        echo "</div></div>";
      ?>
    </div>
  </body>
</html>