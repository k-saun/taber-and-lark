<?php
	require_once 'DAO.php'
	$dao = new DAO();
	$dao->getItem($_GET['item_id']);
	
?>