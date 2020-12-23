<?php

/**
 * 
 */
class Membre
{
	private $id;
	private $nom;
	private $prenom;
	private $mdepasse;
	private $login;
	
	public function __construct()
	{
		$ctp = func_num_args();
		$args = func_get_args();
	

		switch ($ctp) {
			case 3:
				$co = $args[0];
				$login = $args[1];
				$mdepasse = $args[2];

				//cas ou le membre existe deja 

				$result = mysqli_query($co,"SELECT * FROM utilisateur WHERE login='$login' AND mdp='$mdepasse'") or die ("erreur requete"); 
				
				while ($row = mysqli_fetch_assoc($result)){
					$this -> co = $co;
					$this -> nom = $row["nom"];
					$this -> prenom = $row["prenom"];
					$this -> id = $row["id"];
					$this -> login = $row["login"];
					$this -> mdepasse = $row["mdp"];
				}									
				break;
			
			case 5:
				$co = $args[0];
				$nom = $args[1];
				$prenom = $args[2];
				$login = $args[3];
				$mdepasse = $args[4];

				$result = mysqli_query($co,"SELECT * FROM utilisateur WHERE login='$login'") or die ("erreur vérification");


				mysqli_query($co,"INSERT INTO utilisateur(login, mdp, Nom, Prenom) VALUES ('$login','$mdepasse','$nom','$prenom')")
				or die("erreur d'insertion");



				break;
		}
	}

	public function getNom() : string{
		return $this->nom;
	}

	public function setNom(string $nom){
		return $this->nom = $nom;
	}

	public function getPrenom() : string {
		return $this->prenom;
	}

	public function setPrenom(string $prenom){
		return $this->prenom = $prenom;
	}

	public function getMdp() : string{
		return $this->mdepasse;
	}

	public function setMdp(string $mdp){
		return $this->mdepasse = $mdp;
	}

	public function getLogin() : string{
		return $this->login;
	}

	public function setLogin(string $login){
		return $this->login = $login;
	}


	 
	public function connexion() { 
 		session_start(); 
 		$_SESSION['login'] = $this->login;
 	} 

	public function modif_mdepasse($mdp){
		$login = $this -> login;
		$this -> mdepasse = $mdepasse;
		mysql_query($co,"UPDATE utilisateur
		 					SET mdepasse = '$mdp'
		 					WHERE login = '$login'")
		or die ("erreur de changement de mot de passe ");		 						
	}

	public function deconnexion() {
  	session_destroy(); 
  	mysqli_close($this->co);
   } 

}

?>
