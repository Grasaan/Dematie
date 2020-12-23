<?php require_once("../modeles/bd.php"); 
require_once("../modeles/membre.php"); 
session_start(); 
if (isset($_SESSION["login"])) { 
	$coBd = new Bd("BD_projet"); 
	$co = $coBd->connexion(); 
	$login = $_SESSION["login"]; 
	$result = mysqli_query($co, "SELECT mdp FROM utilisateur WHERE login='$login'"); 
	while ($row = mysqli_fetch_assoc($result)) { 
		$pwd = $row["mdp"]; 
		setcookie('login');
		setcookie('password');
		setcookie('nbVisite');
		$m = new membre($co,$nom,$pwd); 
		$m->deconnexion(); 
	} 
		header('Location:../vues/formulaire_connexion.php'); } 
?>