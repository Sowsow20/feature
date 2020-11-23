<?php
try
{


$bdd= new PDO('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)
{
	die('Error '.$e->getMessage());
}

$res=$bdd->prepare('UPDATE membres SET actif = 1 WHERE clé = ?'); 

$has_been_updated = $res->execute(array($_GET['cle']));//return a  boolean if executed or no 
if($has_been_updated)
{
echo "Votre compte a bien été activé, désormet vous pouvez vous connecter sur votre compte  ".$_GET['cle'];
}

//create an avatar for user
$req= $bdd->query('SELECT * FROM membres WHERE clé = "'.$_GET['cle'].' " ');
if($resultat = $req->fetch())
{
//header ("Content-type: image/png");
$image= imagecreate(40,40);
$blanc = imagecolorallocate($image, 255, 255, 255);
$noir = imagecolorallocate($image, 0*00, 99, 0*00);
$text=$resultat['pseudo'];
$email=$resultat['email'];
$pseudo= strtoupper(substr($text, 0,1));
//$chaine_texte = preg_replace("#\[([^]]*)\]#", "<b>\\1</b>", $pseudo);
echo " <b>".$pseudo."</b>";
imagestring($image, 10, 15, 15,$pseudo , $noir);
imagepng($image,"image/".$text.".png"); 
}



?>