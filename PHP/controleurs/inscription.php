<?php
	
	require_once ("../modeles/bd.php") ;
	require_once ("../modeles/membre.php");

	ini_set('display_errors', 'on');
    
      
      
	if ( isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["pwd"])){

		$nom = $_POST ["nom"] ; 
 		$prenom = $_POST ["prenom"];
 		$mail = $_POST["mail"];
 		$mdepasse = $_POST["pwd"];
 	
 	
	 	$coBd = new Bd ("BD_projet");
	 	$co = $coBd->connexion();

	 	$result = mysqli_query($co,"SELECT * FROM utilisateur WHERE login = '$mail'");

	 	if (mysqli_num_rows($result) == 0) { 
	 	$m = new Membre($co,$nom,$prenom,$mail,$mdepasse);
	 	header('Location:../vues/formulaire_connexion.php');
	 	}

	 	header ('Location:../vues/formulaire_inscription.php');	
	 }	
?>
