<?php

	require '../database.php';
	
	if ($_GET['nowstatus'] != null && $_GET['id'] != null) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE convidados SET status = ? where id = ?";
		$q = $pdo->prepare($sql);
		
		if($_GET['nowstatus']=="PENDENTE"){
			$q->execute(array("CONFIRMADO",$_GET['id']));
		}
		else if($_GET['nowstatus']=="CONFIRMADO"){
			$q->execute(array("INDECISO",$_GET['id']));
		}
		else{
			$q->execute(array("PENDENTE",$_GET['id']));
		}		
		Database::disconnect();
		header("Location: index.php");
	}
?>




