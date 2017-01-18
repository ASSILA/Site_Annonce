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



$m_title=$_POST['m_title'];
$m_categ=$_POST['m_categ'];
$m_region=$_POST['m_region'];
$m_textAnnonce=$_POST['m_textAnnonce'];
$m_prix=$_POST['m_prix'];
$m_telephone=$_POST['m_telephone'];




if (empty($_POST['m_title']) || empty($_POST['m_textAnnonce']) || empty($_POST['m_prix']) || empty($_POST['m_telephone']) || !isset($_FILES['m_file_img']))
{
	$_SESSION['message']="Verifier si un champ est vide !!!!!";
	header('Location:cree_nouveau_annonce.php');
}else{
    





// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['m_file_img']) AND $_FILES['m_file_img']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['m_file_img']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['m_file_img']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        $temp = explode(".", $_FILES["m_file_img"]["name"]);
						$newfilename = round(microtime(true)) . '.' . end($temp);
						move_uploaded_file($_FILES["m_file_img"]["tmp_name"], "uploads/" . $newfilename); 

        $req = $bdd->prepare("insert into annonce(titre,contenu,categorie,region,date_creation,num_telephone,image_name) values(:titre,:contenu,:categorie,:region,now(),:num,:file_img)"); 

        $req->execute(array(':titre'=>$m_title,':contenu'=>$m_textAnnonce,':categorie'=>$m_categ,':region'=>$m_region,':num'=>$m_telephone,':file_img'=>$newfilename));



                }
                else{
                	$_SESSION['message']="Verifier extension du fichier !!!!!";
					header('Location:cree_nouveau_annonce.php');
                }
        }else{
        	$_SESSION['message']="Verifier le taille du fichier  !!!!!";
			header('Location:cree_nouveau_annonce.php');
        }
}else{
        	$_SESSION['message']="Erreur uploader le fichier    !!!!!";
			header('Location:cree_nouveau_annonce.php');
        }





 header('Location:index.php');


} 

         


?>