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
$m_id=$_SESSION['m_id_auteur'];
$m_pseudo=$_POST['m_pseudo'];
$m_mot_de_passe=$_POST['m_mot_de_passe'];
$m_nom=$_POST['m_nom'];
if (empty($_POST['m_mot_de_passe']) || empty($_POST['m_pseudo']) || empty($_POST['m_nom']))
{
$_SESSION['message']="verifier si un champ est vide !!!!!";
header('Location:modify_profile.php');

} 
else{
$req = $bdd->prepare("update  auteur set pseudo=:pseudo ,mot_de_pass=:password,nom=:nom where id_auteur=:id_auteur"); 

$req->execute(array(':pseudo'=>$m_pseudo,':password'=>$m_mot_de_passe,':nom'=>$m_nom,':id_auteur'=>$m_id));
 
$_SESSION['pseudo']=$m_pseudo;
$_SESSION['passw']=$m_mot_de_passe;
          
               
header('Location:modify_profile.php');

          }
         


?>