<?php session_start(); 

try
              {
                 $bdd = new PDO('mysql:host=localhost;dbname=site_annonce;charset=utf8', 'root', '');
                 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              }
              catch(Exception $e)
              {
                      die('Erreur : '.$e->getMessage());
              }

              
               $req = $bdd->query("SELECT id_auteur FROM auteur where pseudo=".$_SESSION['m_pseudo']."and mot_de_pass=".$_SESSION['m_mot_de_passe']); 
               $donnees = $req->fetch()
               $_SESSION['m_id_auteur']=$donnees[id_auteur];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
     <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
  </head>
  <body>






  <div class="container">

   <h1 class="text-center ">Web Project : Annonce Site</h1>
  <br><br>
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="index.php">Accueil</a></li>
        <li role="presentation"><a href="parRegion.php">Annonce Par Region</a></li>
        <li role="presentation"><a href="ParCategorie.php">Annonce Par Categorie</a></li>
        <li role="presentation" class="active"><a href="cree_compte.php">Cree un compte </a></li>
        <li role="presentation"><a href="cree_nouveau_annonce.php">Ajouter une annonce</a></li>
    </ul>

    <div class="row">
        <div class="col-md-3"> 
    </div>

<div class="col-md-6"> 
<br>
<?php if(isset($_SESSION['message'])){
          echo "<br><br>";
          echo '<h3><p class="text-center text-danger">'.$_SESSION['message']."</p></h3>";
          echo "<br><br><br>";
          unset($_SESSION['message']);
          }else{
            echo "<br>";
            echo '<img class="center-block img-responsive myblock" src ="images/account_profile_pic1.png"  /><br>';
            echo "<br>";
          }  

            ?>




<form class="form-horizontal" action="modify_profile_verify.php" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pseudo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Pseudo" name="m_pseudo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="m_mot_de_passe">
    </div>
  </div>
    <div class="form-group">
    <label for="inputPassword2" class="col-sm-2 control-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword2" placeholder="Nom" name="m_nom">
    </div>
  </div>
<br>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-primary btn-lg center-block">Modifier votre compte !</button>
    </div>
  </div>
</form>



</div>
      <div class="col-md-3">
       
                 
                  

      <div>

   </div>
  </div>
 
<h1></h1>


        


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>