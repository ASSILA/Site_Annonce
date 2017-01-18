<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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



             <?php 
              if(!isset($_SESSION['user_session']) || $_SESSION['user_session'] == ''){
             ?>
             <br><br><br><br>
                  <h4>Connexion</h4>
                 <form class="form-horizontal" action="con_verify.php" method="post" >
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                      <!-- Form Pseudo-->
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="m_pseudo">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                      <!-- Form Password-->
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="m_mot_de_passe">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                      </div>
                    </div>
                  </form>

                  <form action="cree_compte.php" method="post">
                        <button type="submit" class="btn btn-default">Cree un compte </button>
                  </form>

                <?php }else {

                  echo '<h2>'.'Bonjour Mr/Ms '.$_SESSION['user_name'].'</h2>';
                  ?>
                  <div class="col-sm-offset-2 col-sm-10">
                  <form action="deconnection.php" method="post">
                        <button type="submit" class="btn btn-default">Sign out</button>
                      
                  </form>
                  </div>
                  <?php


                  } ?>












    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>