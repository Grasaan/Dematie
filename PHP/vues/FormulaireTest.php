<!DOCTYPE html>
<html lang="fr">
 <head>
	 <meta charset="UTF-8">
	 <title> Formulaire d'inscription. </title>
 </head>
 
 <body>
    <h1> <strong> Nouveau compte : formulaire d'inscription </strong> </h1>
    <section>
    <form method="POST" action="../controleurs/inscription.php">
        <h3> Nom : </h3>
        <input type="text" name="nom"/>
        <br>
        <h3> Prenom : </h3>
        <input type="text" name="prenom"/>
        <br>
        <h3> Mail : </h3>
        <input type="text" name="mail"/>
        <br>
        <h3> Mot de passe : </h3>
        <input type="text" name="pwd"/>
        <br> <br>
        <input type="submit" name="Envoyer" value="Envoyer"/>
        
    </form>    
    </section>
  </body>
</html>

