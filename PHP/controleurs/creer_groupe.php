<?php
	session_start();

	require_once("../modeles/bd.php");
	require_once("../modeles/membre.php"); 
	$coBd = new Bd("BD_projet");
 	$co = $coBd->connexion();

 	if(isset($_POST["nomGroupe"])){
 		
 		$admin=$_SESSION['login'];
 		$nomGroupe=$_POST['nomGroupe'];

 		$reqGroupe=mysqli_query($co,"SELECT MAX(NumGroupe) From Groupe");
 		$idGroupes=mysqli_fetch_assoc($reqGroupe);
		$reqidGroupe=$idGroupes['MAX(NumGroupe)'];
		$reqidGroupe++;

		$recupId = mysqli_query($co,"SELECT id from utilisateur WHERE login = '$admin'");

		$row = mysqli_fetch_assoc($recupId);
		$id = $row["id"];

 		$reqadmin=mysqli_query($co,"INSERT into Groupe (nomGroupe, Id) VALUES('$nomGroupe','$id')");
 		$reqMembre=mysqli_query($co,"INSERT into Appartient_a VALUES('$reqidGroupe','$id')");
 		
 		if(isset($_POST['listecategorie'])){
	 		$listecat;
	 		$cpt=0;
	 		$nomCat="";
	 		$listecat=$_POST['listecategorie'];

	 		for($i=0;$i<strlen($listecat);$i++){
	 			
	 			
	 			if($listecat[$i]==';' OR $listecat[$i]==' ' ){
	 				if(strlen($nomCat)>=2){
	 					
	 					$requtil=mysqli_query($co,"INSERT INTO CATEGORIE(nomCat) VALUES('$nomCat')");
	 					$reqidCat=mysqli_query($co,"SELECT Max(numCat) FROM categorie");
	 					$idCate=mysqli_fetch_assoc($reqidCat);
	 					$id=$idCate['Max(numCat)'];

	 					$reqCat=mysqli_query($co,"INSERT INTO Correspond values ('$id','$reqidGroupe')");
	 					$nomCat="";

	 				}
	 			}else{
	 					$nomCat.=$listecat[$i];
	 				}

	 			}

 			
 		}
 		

 		
 	
 		$liste;
 		$cpt=0;
 		$mail="";
 		$liste=$_POST['listemail'];

 		for($i=0;$i<strlen($liste);$i++){
 			
 			
 			if($liste[$i]==';' OR $liste[$i]==' ' ){
 				if(strlen($mail)>6){
 					$requtil=mysqli_query($co,"INSERT INTO Appartient_a VALUES('$reqidGroupe','$admin')");

 					$requser =mysqli_query($co,"SELECT * FROM utilisateur WHERE login='$mail'");

 					$row = mysqli_fetch_assoc($requser);
					$idMembre = $row["id"];


 					if($requser){
	 					$header="MIME-Version: 1.0\r\n";
						$header.='From:"Dématie"<grasaan13@gmail.com>'."\n";
						$header.='Content-Type:text/html; charset="uft-8"'."\n";
						$header.='Content-Transfer-Encoding: 8bit';

						$message="
						<html>
							<body>
								<div align=\"center\">
									<h4>Salut c'est $admin rejoins mon groupe en cliquant sur le lien !</h4> 
									</br>
									<a href=\"http://localhost:8888/ProjetTutoreI%cc%80%c2%81/PHP/controleurs/ajouter_membre.php?idGroupe=".$reqidGroupe."&idAdmin=".$admin."&idMembre=".$idMembre."\">Clique et rejoins mon groupe !</a>
								</div>
							</body>
						</html>
						";
						

						mail($mail, "Confirmation de compte", $message, $header);
						echo $mail;
						echo $idMembre;

 					}
 					
 				}
 				$mail="";
 			}else{
 				$mail.=$liste[$i];
 			}

 		}
 			//header('Location: ../vues/PagePrincipale.php');	
 			
 	}
 
?>