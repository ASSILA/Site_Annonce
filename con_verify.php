<?php
session_start();
  try
{
   $bdd = new PDO('mysql:host=localhost;dbname=site_annonce;charset=utf8', 'root', '');
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if(isset($_POST['m_pseudo']) &&isset($_POST['m_mot_de_passe'])){
$m_pseudo=$_POST['m_pseudo'];
$m_mot_de_passe=$_POST['m_mot_de_passe'];
}else{

$m_pseudo=$_SESSION['pseudo'];
$m_mot_de_passe=$_SESSION['passw'];
}

if (empty($m_pseudo) || empty($m_mot_de_passe))
{
echo "<h1>verifier si un champ est vide !!!!!</h1>";

} 
else{
$req = $bdd->prepare('SELECT * FROM auteur where pseudo=:p  LIMIT 1'); 

$req->execute(array(':p'=>$m_pseudo));
 $userRow=$req->fetch(PDO::FETCH_ASSOC);
 echo '<br>';
          if($req->rowCount() > 0)
          {

             if($m_mot_de_passe==$userRow['mot_de_pass'])
             {
                $_SESSION['user_session'] = $userRow['pseudo'];
                $_SESSION['user_name']=$userRow['nom'];
                $_SESSION['id_client']=$userRow['id_auteur'];
                header('Location:index.php');
                
             }
             else
             {
                echo "<h1> mot de passe incorrect !!!!!</h1>";
             }
          }
          else{
          	echo "<h1> Login  incorrect !!!!!</h1>";
          }

}
?>