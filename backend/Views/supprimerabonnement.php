<?php
	 
	 include_once '../Controller/abonnementC.php';
	$abonnementC=new abonnementC();
	$abonnementC->supprimerabonnement($_GET["id"]);
	header('Location:afficherListeAbonnements.php');
?>