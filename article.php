<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Web Project : Annonce Site</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
     <link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
     <link href="css/style_article.css" rel="stylesheet" type="text/css" media="screen">
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
       <!--   <?php   if(isset($_SESSION['user_session']) ){ ?>
        <li role="presentation"><a href="modify_profile.php">Modifier votre profile</a></li>
        <?php } ?> --> 

    </ul>


    <div class="row">
    <div class="col-md-1"></div>
        <div class="col-md-7"> 
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

              
               $req = $bdd->query("SELECT * FROM annonce where id_article=".$_GET['id']); 
               $donnees = $req->fetch()
               ?>
<div class="resume">
              <br><br>
              <h1><?php echo $donnees['titre']; ?></h1>
<div class="row">
  
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>
              <?php if(empty($donnees['image_name'])){
                $path_img='images/article_pic.png';
              }else{
                $path_img='uploads/'.$donnees['image_name'];
              }
              
                echo'<img class="img-rounded img-responsive" alt="" src="'.$path_img.'">';
                ?>
              </figure>
              
              <div class="row">
                <div class="col-xs-12 social-btns"> 
                </div>
              </div>
              
            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
                <li class="list-group-item">Categorie :  <?php echo $donnees['categorie']; ?></li>
                <li class="list-group-item">Region : <?php echo $donnees['region']; ?></li>
                <li class="list-group-item">Date : <?php echo $donnees['date_creation']; ?></li>
                <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo '  '.$donnees['num_telephone']; ?> </li>
                
              </ul>
            </div>

          </div>

        </div>

      </div>

      <div class="bs-callout bs-callout-danger">
        <h4>Annonce</h4>
        <p>
         <br>
                       <?php 
                        $string =nl2br($donnees['contenu']);
                        
                        echo $string;
                      ?>

        </p>
      </div>
    </div>
  

</div>
    
</div>




 <br><br><br><br>
<h4>created by Mahdi </h4>
               </div>

<div class="col-md-1"></div>
      <div class="col-md-3">
              <?php include("log-cat.php"); ?>


      <div>

   </div>
  </div>



        




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>