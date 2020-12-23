<?php
   session_start();
  require_once("../modeles/bd.php"); 
  require_once("../modeles/membre.php"); 
    
?> 


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Mon compte </title>

    <!-- Favicons -->
  <link rel="icon" href="mega.ico" />

    <!-- Custom styles for this template -->
    <link href="page_co_css.css" rel="stylesheet">
  </head>
 
 <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand"><img class="logo" src="speakerH.png" width="100" height="100" style="padding-bottom: 30px;" /> </a>

     <div class="collapse navbar-collapse">
       <ul class="navbar-nav">
         <li class="nav-item active">
           <a class="nav-link" href="#">Page personnelle <span class="sr-only"></span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="publication.php">Publications <span class="sr-only"></span></a>
         </li>
         <li class="nav-item ">
           <a class="nav-link" href="Formulaire_prop.php">Ajouter une proposition <span class="sr-only"></span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="Formulaire_groupe.php">Créer un groupe</a>
         </li>
       </ul>
    
     </div>
      <a href="../Controleurs/deconnect.php"> <img class="deco" title="Déconnexion" src="deco.png"/></a>
      <a href="PageProfil.php"> <img class="param" title="Paramètres" src="param.png"> </a>
   </nav>
 </header>



 <div class="jumbotron">
    <div class="container mon_compte">
      <h1 class="display-3">Mon compte</h1>
      <p><I>Cette page vous permet de visualiser et de modifier les informations relatives à votre compte.</I></p>
      <p><a class="btn btn-primary btn-lg" href="PagePrincipale.php" role="button">Retourner sur ma page personelle &raquo;</a></p>
    </div>
  </div>

  <div class="container">
            <h2 style="text-align: center;">Mes données personnelles</h2>
            <br/>
    <div class="perso">
    <div class="row">
      <div class="col-md-4">
          <h4> Adressse mail</h4>
        <p >adresse mail actuelle : <b><?php if(isset($_SESSION['login'])){
         echo $_SESSION['login'];
       } 
       else echo "Vous n'êtes pas connecté."; ?></b></p>
      </div>
       
        <div class="col-md-4">
          <h4> Mot de passe</h4>
          <form method="POST" action="../Controleurs/changemdp.php">
        <p>Mot de passe actuel : <b><?php 
        if(isset($_COOKIE['password'])){
          echo $_COOKIE['password'];
          }
          else echo "Vous n'êtes pas connecté";

           ?></b></p>
         <p><label  for="email">Nouveau mot de passe :  <input class="text" type="password" id="password" name="password" placeholder="Entrez votre nouveau mot de passe"  style="width: 300px"> </label></p>
       <button type="submit" class="btn btn-primary" style="margin-left: 40%"> Modifier</button>
      </form>
    </div>

       <div class="col-md-4">
          <h4> Nom & prénom</h4>
        <form method="POST" action="../Controleurs/changemdp.php">
        <p>Nom actuel : <b><?php 
        $coBd = new Bd("BD_projet"); 
        $co = $coBd->connexion() or die("erreur connexion"); 

        if(isset($_SESSION['login'])){
        $login= $_SESSION['login'];
        $result = mysqli_query($co,"SELECT nom FROM utilisateur WHERE login='$login'") or die("erreur requete"); 
        
        $row = mysqli_fetch_assoc($result);
        echo $row["nom"];
      }
      else echo "Vous n'êtes pas connecté";
        ?></b></p>

         <p>Prénom actuel : <b><?php 
        $coBd = new Bd("BD_projet"); 
        $co = $coBd->connexion() or die("erreur connexion"); 

        if(isset($_SESSION['login'])){
        $login= $_SESSION['login'];
        $result = mysqli_query($co,"SELECT prenom FROM utilisateur WHERE login='$login'") or die("erreur requete"); 
        
        $row = mysqli_fetch_assoc($result);
        echo $row["prenom"];
      }
      else echo "Vous n'êtes pas connecté.";
        ?></b></p>
      </form>
      </div>
    </div>
  </div>
 </div> 
 </body>
</html>
