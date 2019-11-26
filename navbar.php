

<div id="navbar">
	<div id="nav-left" class="nav-section">
		<div class="burger">
		  <div class="bar bar-1"></div>
		  <div class="bar bar-2"></div>
		  <div class="bar bar-3"></div>
		</div>
	</div>
    
    <div id="nav-middle" class="nav-section">
		<div class="center-container">
		  <a href="/shop.php">
		    <img src="/images/temp-sprite.png" alt="logo">
		  </a>	
		</div>
	</div>

	<div id="nav-right" class="nav-section">
			<div class="icon" id="cart-icon"></div>
			<a href="/profile.php">
				<div class="icon" id="account-icon"></div>	
			</a>
			<?php
				include_once("DAO.php");
				if (isset($_SESSION['logged_in']) &&  $_SESSION['logged_in'] == true) {
				    $dao = new DAO();
					$user = $dao->getUser($_SESSION['user_email']);
					echo "<div><a href =\"/profile.php\">{$user['user_email']}</a></div>";
			  	}	
			?>
	</div>
</div>