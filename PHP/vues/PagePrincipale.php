<?php
   session_start();
  require_once("../modeles/bd.php");
  require_once("../modeles/membre.php"); 
  $coBd = new Bd("BD_projet");
  $co = $coBd->connexion();
  ini_set('display_errors', 'on');
   
?> 

<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet"
      type="text/css" />
 <head>
	 <meta charset="UTF-8">
     <link href="bootstrap.min.css" rel="stylesheet">
     <link href="page_co_css.css" rel="stylesheet">
     <link rel="shortcut icon" href="9317logo_bd.ico">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Favicons -->
  <link rel="icon" href="mega.ico" />


	 <title> Bienvenue sur ~ Dématie ~  </title>
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

      <?php
            ini_set('display_errors', 'on');

                $result = mysqli_query($co, "SELECT * FROM proposition");
                        while ($data = mysqli_fetch_array($result)) {    

                          $id =$data['Id'];
                          $result2 = mysqli_query($co, "SELECT * FROM utilisateur WHERE id='$id'");
                          $data2 = mysqli_fetch_array($result2);
                          $Nom = $data2['Nom'];
                          $Prenom = $data2['Prenom'];

                          $numCatP = $data['CategorieP'];
                          $result3 = mysqli_query($co,"SELECT * FROM Categorie WHERE numCat = '$numCatP'");
                          $data3 = mysqli_fetch_array($result3);
                          $CatP = $data3['NomCat'];

                          $numCatS = $data['CategorieS'];
                          $result4 = mysqli_query($co,"SELECT * FROM Categorie WHERE numCat = '$numCatS'");
                          $data4 = mysqli_fetch_array($result4);
                          $CatS = $data4['NomCat'];

                          $numGroupe = $data['NumGroupe'];
                          $result5 = mysqli_query($co,"SELECT * FROM groupe WHERE NumGroupe ='$numGroupe'");
                          $data5 = mysqli_fetch_array($result5);
                          $NOMGROUPE = $data5['nomGroupe'];


                          
                  //if ($data['DateLimite'] = ""){$dateL = 'NULL'}else{$dateL = $data['DateLimite'] = "" };

                    echo "<div class='card text-black bg-white mb-3'> <div class='card-header'> <strong> Sujet : </strong>".$data['DescrC']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp". 
                    "<strong> Categorie Primaire : </strong>".$CatP." <strong> Categorie Secondaire : </strong> ".$CatS."<div class='card-body'>".$data['DescrL']."<br><br>"."<strong> Par </strong> : ".$Nom." ".$Prenom."&nbsp&nbsp&nbsp"." <strong> Dans le groupe : </strong> ".$NOMGROUPE."&nbsp&nbsp&nbsp"."<strong> le </strong> ".$data['DateEnv']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href='#'' class='card-link'>J'aime</a>"."<a href='#'' class='card-link'>J'aime pas </a>"."<a href='#'' class='card-link'>Signaler </a>"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong> Date limite de vote : </strong>".$data['DateLimite']."</br></br> </br></br>";


                    

                    
                }    

        ?>
        
 </body>
</html>
 
 
