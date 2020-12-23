<?php
   session_start();
  require_once("../modeles/bd.php");
  require_once("../modeles/membre.php"); 
  $coBd = new Bd("BD_projet");
  $co = $coBd->connexion();
  ini_set('display_errors', 'on');
    
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

    <title>Creer un Groupe </title>

    <!-- Favicons -->
  <link rel="icon" href="mega.ico" />


  <link href="page_co_css.css" rel="stylesheet">
  </head>


  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand"><img class="logo" src="speakerH.png" width="100" height="100" style="padding-bottom: 30px;" /> </a>

     <div class="collapse navbar-collapse">
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" href="PagePrincipale.php">Page personnelle <span class="sr-only"></span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="publication.php">Publications <span class="sr-only"></span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="Formulaire_prop.php">Ajouter une proposition <span class="sr-only"></span></a>
         </li>
         <li class="nav-item active">
           <a class="nav-link" href="Formulaire_groupe.php">Créer un groupe</a>
         </li>
       </ul>
    
     </div>
      <a href="../Controleurs/deconnect.php"> <img class="deco" title="Déconnexion" src="deco.png"/></a>
      <a href="PageProfil.php"> <img class="param" title="Paramètres" src="param.png"> </a>
   </nav>
 </header>




       <div class="body_Comm col-md-12">
      <main role="main" class="container_Ajoutcomm container border-gray">
          <br/>
        <h5 class="border-bottom">
          Créer un groupe
        </h5>
        
<form method="POST" action="../controleurs/creer_groupe.php">
    <h6>Nom du groupe
    &nbsp; <input type="text" placeholder="Nom du groupe" name="nomGroupe" value="" required />
  </h6>
  </br>   

    <h6>Inviter des personnes à rejoindre votre groupe</h6>
    <input type="text" placeholder="Separer les adresses mail par des ;" name="listemail" id="listemail" style="width: 90%; margin-left: auto; margin-right: auto; height : 150px"  />
    <br/>
    <br/>
      <h6>Catégories</h6>
          <br/>
     <h6>Ajouter des nouvelles categories &nbsp;<small><I> N'oubliez de rajouter un ; après chaque catégorie et aussi a la fin</I></h6>
     <input type="text" placeholder="Separer les categories par des ;" name="listecategorie" id="listecategorie" style="width: 90%; margin-left: auto; margin-right: auto; height : 150px"/>
<br/>
<br/>
   <input type="submit" class="btn-comm btn btn-primary" value="Creer votre groupe"/>
</form>
  <br/>
  <br/>
   </main>
 </div>
 <br/>
</div>
        
 </body>
 </html>