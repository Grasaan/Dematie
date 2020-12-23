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

    <title>Nouvelle idée </title>

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
          <li class="nav-item active">
           <a class="nav-link" href="Formulaire_prop.php">Ajouter une proposition <span class="sr-only"></span></a>
         </li>
         <li class="nav-item ">
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
          Quelles sont vos nouvelles idées aujourd'hui??
        </h5>
        
<form method="POST" action="../controleurs/ajout_prop.php">
    <h6>Description courte
    &nbsp; <input type="text" placeholder="Petite Description" name="descrC" style="width: 70%"/>
  </h6>
  </br>   

    <h6>Description longue </h6>
    <input type="text" placeholder="Exprimer vos idées" name="descrL" id="descrL" style="width: 90%; margin-left: auto; margin-right: auto; height : 150px"/>
    <br/>
    <br/>

    <h6> Nom du groupe: 
        <?php
            $admin=$_SESSION['login'];

            ini_set('display_errors', 'on');

              $result = mysqli_query($co,"SELECT * from utilisateur WHERE login = '$admin'");
              $data = mysqli_fetch_array($result);
              $numId = $data['Id'];

              $result1 = mysqli_query($co,"SELECT * from Appartient_a WHERE id = '$numId'");

              while ($data1 = mysqli_fetch_array($result1)){
                $numGroupe = $data1['NumGroupe'];
                $result2 = mysqli_query($co,"SELECT * from Groupe WHERE numgroupe = '$numGroupe'");

                while ($data2 = mysqli_fetch_array($result2)){
                $nomgroupe2 = $data2['nomGroupe'];

                echo "<input type='radio' name='nomG' value=$nomgroupe2 checked>&nbsp;<label for = $nomgroupe2>$nomgroupe2 </label>&nbsp;&nbsp;&nbsp; ";
              }
            }

        ?>
  <br><br>
    </h6>

      <h6>Catégorie Primaire :
        </br>
    <?php
           

            ini_set('display_errors', 'on');

                $result2 = mysqli_query($co,"SELECT * from Categorie");

                while ($data2 = mysqli_fetch_array($result2)){
                $nomCategorie = $data2['NomCat'];

                echo "<input type='radio' name='CatP' value=$nomCategorie checked>&nbsp;<label for = $nomCategorie>$nomCategorie </label>&nbsp;&nbsp;&nbsp; ";
              }
            

        ?>
  </h6>
  </br>

  <h6>Catégorie Secondaire :
        </br>
    <?php
           

            ini_set('display_errors', 'on');

                $result2 = mysqli_query($co,"SELECT * from Categorie");

                while ($data2 = mysqli_fetch_array($result2)){
                $nomCategorie = $data2['NomCat'];

                echo "<input type='radio' name='CatS' value=$nomCategorie checked>&nbsp;<label for = $nomCategorie>$nomCategorie </label>&nbsp;&nbsp;&nbsp; ";
              }
            

        ?>
  </h6>
  </br>

  <h6> Voulez-vous une date limite ?
    <input type = "date" name = "dateF" >
  </h6>



<br/>
<br/>
   <input type="submit" class="btn-comm btn btn-primary" value="Publier votre proposition"/>
</form>
  <br/>
  <br/>
   </main>
 </div>
 <br/>
</div>
        
 </body>
 </html>