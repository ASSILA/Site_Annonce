<?php session_start(); ?>
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
        <li role="presentation"class="active"><a href="parRegion.php">Annonce Par Region</a></li>
        <li role="presentation"><a href="ParCategorie.php">Annonce Par Categorie</a></li>
        <?php 
              if(!isset($_SESSION['user_session']) || $_SESSION['user_session'] == ''){ ?>
        <li role="presentation"><a href="cree_compte.php">Cree un compte </a></li>
        <?php } ?>
        <li role="presentation"><a href="cree_nouveau_annonce.php">Ajouter une annonce</a></li>
       <!--   <?php   if(isset($_SESSION['user_session']) ){ ?>
        <li role="presentation"><a href="modify_profile.php">Modifier votre profile</a></li>
        <?php } ?> --> 

    </ul>
    <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-4"> 
              

                  <br><br>
                  <h3><strong>categoires</strong></h3>
                  <table class="table table-bordered">
                  <tr>
                  <td><a href="index.php?region=Tunis">Tunis</a></td>
                  </tr>
                  <tr>
                  <td><a href="index.php?region=Ariana">Ariana</a></td>
                  </tr>
                  <tr>
                  <td><a href="index.php?region=Béja">Béja</a></td>
                  </tr>
                  <tr>
                  <td><a href="index.php?region=Gabès">Gabès</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Jendouba">Jendouba</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Kairouan">Kairouan</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Kasserine">Kasserine</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Kébili">Kébili</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Le Kef">Le Kef</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Mahdia">Mahdia</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=La Manouba">La Manouba</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Médenine">Médenine</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Monastir">Monastir</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Nabeul">Nabeul</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Sidi Bouzid">Sidi Bouzid</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Siliana">Siliana</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Sousse">Sousse</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Tataouine">Tataouine</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Tozeur">Tozeur</a></td>
                  </tr><tr>
                  <td><a href="index.php?region=Zaghouan">Zaghouan</a></td>
                  </tr>
                  
                  
                  </table>
          <br><br><br><br>
        </div>


<div class="col-md-2"></div>
      <div class="col-md-3">
       <?php include("log-cat.php"); ?>

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