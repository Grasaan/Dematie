
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

    <title>Inscription </title>

    <!-- Favicons -->
  <link rel="icon" href="mega.ico" />

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>






  <body>
  
      <form class="form-signin" method = "POST" action="../controleurs/inscription.php" >
        <img class="mb-4" src="speaker.png" alt="" width="350" height="300">

        <h1 class="h3 mb-3 font-weight-normal">Rejoignez nous !</h1>

        <label for="nom" class="sr-only">Nom</label>
        <input type="Nom" id="nom" name="nom" class="form-control" placeholder="Nom" required autofocus>

        <label for="prenom" class="sr-only">prenom</label>
        <input type="prenom" id="prenom" name="prenom" class="form-control" placeholder="prenom" required autofocus>


        <label for="mail" class="sr-only">Mail</label>
        <input type="email" id="mail" name="mail" class="form-control" placeholder="Mail" required autofocus>

        <label for="pwd" class="sr-only">Mot de passe</label>
        <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Mot de passe" required>

        <label for="pwd2" class="sr-only">Verification Mot de passe</label>
        <input type="password" id="pwd2" name="pwd2" class="form-control" placeholder="Vérification Mot de passe" required>
        
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscire</button>

      </form>
      
      
      
     
</body>
</html>
