<?php
	
	require_once("../modeles/bd.php");
	require_once("../modeles/membre.php"); 
	$coBd = new Bd("BD_projet");
 	$co = $coBd->connexion();

	if(isset($_GET['idGroupe']) AND isset($_GET['idMembre']) AND isset($_GET['idAdmin'])){
		$idGroupe=$_GET['idGroupe'];
		$mail=$_GET['idMembre'];
		$admin=$_GET['idAdmin'];

		$reqverif=mysqli_query($co,"SELECT * FROM groupe WHERE idGroupe='$idGroupe' AND login='$admin'");
		
		if($reqverif){
			echo $idGroupe;
			echo $mail;
			$requser=mysqli_query($co,"INSERT INTO Appartient_a VALUES('$idGroupe','$mail')");
		}
		

	}
	header('Location:../Vues/formulaire_connexion.php');
	

?>