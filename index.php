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
        <li role="presentation" class="active"><a href="index.php">Accueil</a></li>
        <li role="presentation"><a href="parRegion.php">Annonce Par Region</a></li>
        <li role="presentation"><a href="ParCategorie.php">Annonce Par Categorie</a></li>
        <?php 
              if(!isset($_SESSION['user_session']) || $_SESSION['user_session'] == ''){ ?>
        <li role="presentation"><a href="cree_compte.php">Cree un compte </a></li>
        <?php } ?>
        <li role="presentation"><a href="cree_nouveau_annonce.php">Ajouter une annonce</a></li>


    </ul>

    <div class="row">
        <div class="col-md-9"> 
              <?php 
                try
              {
                 $bdd = new PDO('mysql:host=localhost;dbname=site_annonce;charset=utf8', 'root', '');
                 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              }
              catch(Exception $e)
              {
                      die('Erreur : '.$e->getMessage());
              }

              $nb=8;

               if(isset($_GET['categ'])){
                $catg=$_GET['categ'];
                $req = $bdd->prepare('SELECT * FROM annonce WHERE categorie = :categi');
                 $req->bindParam(':categi', $catg, PDO::PARAM_STR, 20);
                 $req->execute();

               }else if(isset($_GET['region'])){
                $region=$_GET['region'];
                $req = $bdd->prepare('SELECT * FROM annonce WHERE region = :region');
                 $req->bindParam(':region', $region, PDO::PARAM_STR, 20);
                 $req->execute();

               }else {
               $req = $bdd->query("SELECT   id_article,id_client, titre,contenu,categorie, date_creation FROM annonce ORDER BY date_creation DESC LIMIT 0, $nb"); }
               ?>



        
                        
               
                          <br><br>
              <table class="table table-striped">
               
                <thead>
              <tr>
                  <td><strong>Title</strong></td>
                  <td><strong>date</strong></td>
                  <td><strong>categorie</strong></td>
              </tr>
              </thead>
              <?php 
                        
                        while ($donnees = $req->fetch())
                        {
                          
                        
                        ?>
              <tr>
                  <td>
                  <?php 
                  $link='article.php?id='.$donnees['id_article'];
                  echo'<a href="'.$link.'">';echo $donnees['titre']; ?></a></td>
                  <td><?php echo $donnees['date_creation']; ?></td>
                  <td><?php echo $donnees['categorie']; ?></td>
              </tr>
              <?php } ?>



              </table>
              <?php $req->closeCursor(); ?>





<br><br><br><br>
 <div class="row text-center  center-block">
            <div class="col-lg-12">
              <ul class="pagination pagination-centered">

        <li class="disabled"><a href="#">&laquo;</a></li>

        <li class="active"><a href="#">1</a></li>

        <li><a href="#">2</a></li>

        <li><a href="#">3</a></li>

        <li><a href="#">4</a></li>

        <li><a href="#">5</a></li>

        <li><a href="#">&raquo;</a></li>

    </ul>  
            </div>
        </div>




<br>
          
        </div>



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