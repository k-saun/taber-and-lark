

<div class="navbar">
  <ul>
	<li>
  		<div class="burger-bar"></div>
  		<div class="burger-bar"></div>
  		<div class="burger-bar"></div>
	</li>
    
	<li class="center-container">
	  <a href="/index.php">
	    <img src="/images/temp-sprite.png" alt="logo">
	  </a>	
	</li>
    
	<li>
		<div id="nav-right">
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
	</li>
  </ul>
</div>