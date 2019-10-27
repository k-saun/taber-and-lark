<html>
  <head>
	<title>T&L</title>
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

        echo "<div class=\"item-row\"><div class=\"item-column\">";

        $i = 0;
        foreach($items as $item){
          $item_html[$0] = "<a href=\"{$item['item_url']}\">" .
                  "<img src=\"{$item['item_img']}>" .
                "</a>";
        }
        /*
        $i = 0;
        for($i; $i < ($num_rows/2); $i++){
          echo "<a href=\"{$items[$i]['item_url']}\">" .
                  "<img src=\"{$items[$i]['item_img']}>" .
                "</a>";
        }
        echo "</div>";
        echo "<div class=\"item-column\">";

        for($i; $i < ($num_rows); $i++){
          echo "<a href=\"{$item[$i]['item_url']}\">" .
                  "<img src=\"{$item[$i]['item_img']}>" .
                "</a>";
        }*/

        echo "</div></div>";
      ?>
    </div>
	</body>
</html>