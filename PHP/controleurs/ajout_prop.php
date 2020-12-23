<?php
	ini_set('display_errors', 'on');
	session_start();


	require_once("../modeles/bd.php");
	require_once("../modeles/membre.php"); 
	$coBd = new Bd("BD_projet");
 	$co = $coBd->connexion();
 	
 	ini_set('display_errors', 'on');

 	if(isset($_POST["descrC"])&& isset($_POST["NomGroupe"]) ){
 		
 		$admin=$_SESSION['login'];
 		$nomGroupe=$_POST['nomG'];
 		$descrC = $_POST["descrC"];
 		$descrL = $_POST["descrL"];
 		$CatP =  $_POST["CatP"];
 		$CatS =  $_POST["CatS"];
 		$dateF = $_POST["dateF"];

 		$recupNomC = mysqli_query($co,"SELECT * from categorie WHERE nomCat = 'CatP'");
 		$row1 = mysqli_fetch_assoc($recupNomC);
 		$CP = $row1["NomCat"]

		$recupId = mysqli_query($co,"SELECT id from utilisateur WHERE login = '$admin'");

		$row = mysqli_fetch_assoc($recupId);
		$id = $row["id"];

		$recupNumG = mysqli_query($co,"SELECT numGroupe from groupe WHERE NomGroupe = '$nomGroupe'");

		$row2 = mysqli_fetch_assoc($recupNumG);
		$numG = $row2["numGroupe"];

		if !(isset($_POST["dateF"])){
 			
 			$insert = mysqli_query($co,"INSERT into Proposition (`DescrC`, `DescrL`, `CategorieP`, `CategorieS`, `Id`, `NumGroupe`) 
 									values ('$descrC','$descrL' ,'$CP','$CS','$id','$numG')");
 		}else{

 		$insert = mysqli_query($co,"INSERT into Proposition (`DescrC`, `DescrL`, `CategorieP`, `CategorieS`, `Id`, `NumGroupe`,DateLimite) 
 									values ('$descrC','$descrL','$CP','$CS','$id','$numG','$dateF')");

 		}
 		
 		
 		}
 			header('Location: ../vues/PagePrincipale.php');	
 
?>