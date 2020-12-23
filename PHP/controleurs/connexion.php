<?php 
session_start();
	require_once("../modeles/bd.php"); 
	require_once("../modeles/membre.php"); 
	ini_set('display_errors', 'on');

	if (isset($_POST["login"]) && isset($_POST["password"])) { 
		$login = $_POST["login"]; 
		$password = $_POST["password"]; 
		$coBd = new Bd("BD_projet"); 
		$co = $coBd->connexion() or die("erreur connexion"); 
		$result = mysqli_query($co, "SELECT * FROM utilisateur WHERE login='$login' AND mdp='$password'") or die("erreur requete"); 
		
		if (mysqli_num_rows($result) == 1) {

			if(isset($_COOKIE['nbVisite'])) $nbVisite=$_COOKIE['nbVisite']+1;
			else $nbVisite=1;
			setcookie('login', $login, time()+7200,'/');
			setcookie('password', $password, time()+7200,'/');
			setcookie('nbVisite',$nbVisite, time()+7200,'/');
			$m = new membre($co,$login,$password); $m->connexion(); 
			header('Location:../vues/PagePrincipale.php'); 
		} 
		
		echo "N'allez pas plus vite que la musique ! Apprenons nous a nous connaitre d'abord";
		echo "<br>";
    	echo "<a href='../vues/formulaire_inscription.php'>cliquer ici</a>";
	}	
?>








