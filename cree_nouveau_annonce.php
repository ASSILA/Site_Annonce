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
        <li role="presentation"><a href="index.php">Accueil</a></li>
        <li role="presentation"><a href="parRegion.php">Annonce Par Region</a></li>
        <li role="presentation"><a href="ParCategorie.php">Annonce Par Categorie</a></li>
        <?php 
              if(!isset($_SESSION['user_session']) || $_SESSION['user_session'] == ''){ ?>
        <li role="presentation"><a href="cree_compte.php">Cree un compte </a></li>
        <?php } ?>
        <li role="presentation"  class="active"><a href="cree_nouveau_annonce.php">Ajouter une annonce</a></li>
       <!--   <?php   if(isset($_SESSION['user_session']) ){ ?>
        <li role="presentation"><a href="modify_profile.php">Modifier votre profile</a></li>
        <?php } ?> --> 

    </ul>
    <div class="row">
        <div class="col-md-3"> 
         <br> <br><br><br><br>    

<img class="center-block" src ="images/create_ad_pic.png"  />




</div>
<div class="col-md-6"> 
<?php if(isset($_SESSION['message'])){
          echo "<br><br>";
          echo '<h3><p class="text-center text-danger">'.$_SESSION['message']."</p></h3>";
          echo "<br><br>";
          unset($_SESSION['message']);
          }else{
            echo"<br><br><br><br>";
          }  

            ?>
<form class="form-horizontal" action="cree_annonce_verify.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="m_title">
    </div>
  </div>
  <div class="form-group" >
    <label for="inputCategorie" class="col-sm-2 control-label" >Categorie</label>
    <div class="col-sm-10">
        <select  class="form-control" id="inputCategorie" name="m_categ">
          <option value="Immobilier">Immobilier</option>
          <option value="Auto/Moto">Auto/Moto</option>
          <option value="Image et Son">Image et Son</option>
          <option value="Electromenager">Electromenager</option>
          <option value="Informatique">Informatique</option>
          <option value="Services">Services</option>
        </select>
    </div>
  </div>

    <div class="form-group">
    <label for="inputRegion" class="col-sm-2 control-label">Region</label>
    <div class="col-sm-10">
          <select  class="form-control" id="inputRegion" name="m_region">
            <option value="Tunis">Tunis</option>
            <option value="Ariana">Ariana</option>
            <option value="Béja">Béja</option>
            <option value="Ben Arous">Ben Arous</option>
            <option value="Bizerte">Bizerte</option>
            <option value="Gabès">Gabès</option>
            <option value="Jendouba">Jendouba</option>
            <option value="Kairouan">Kairouan</option>
            <option value="Kasserine">Kasserine</option>
            <option value="Kébili">Kébili</option>
            <option value="Le Kef">Le Kef</option>
            <option value="Mahdia">Mahdia</option>
            <option value="La Manouba">La Manouba</option>
            <option value="Médenine">Médenine</option>
            <option value="Monastir">Monastir</option>
            <option value="Nabeul">Nabeul</option>
            <option value="Sidi Bouzid">Sidi Bouzid</option>
            <option value="Siliana">Siliana</option>
            <option value="Sousse">Sousse</option>
            <option value="Tataouine">Tataouine</option>
            <option value="Tozeur">Tozeur</option>
            <option value="Zaghouan">Zaghouan</option>
          </select>
    </div>
  </div>

<div class="form-group">
    <label for="inputTexte" class="col-sm-2 control-label">Texte de l'annonce
</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputTexte" rows="3" name="m_textAnnonce"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputPrix" class="col-sm-2 control-label">Prix</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPrix" placeholder="Prix en Dinar Tunisian" name="m_prix">
    </div>
  </div>

   <div class="form-group">
    <label for="inputTelephone" class="col-sm-2 control-label">Téléphone</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTelephone" placeholder="Téléphone" name="m_telephone">
    </div>
  </div>

    <div class="form-group">
    <label for="inputPhoto" class="col-sm-2 control-label">Ajouter Photo</label>
    <div class="col-sm-10">
      <span class="file-input btn btn-block btn-primary btn-file">
                Browse&hellip; <input type="file" name="m_file_img" multiple>
            </span>
    </div>
  </div>

  
<br><br>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg center-block">Crée une annonce</button>
    </div>
  </div>
</form>


<br><br><br><br>
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