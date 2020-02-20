<?php
session_start();
try
{
	$bdd= new PDO ('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('ERROR '.$e->getMessage());
}

$req = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$req->execute(array($_SESSION['id']));
if($membre = $req->fetch())
{
echo " Nom : ".$membre['pseudo'];?><br><?php
echo " Email : ".$membre['email'];?><br><?php
echo " Date de naissance : ".$membre['date_naissance'];?><br><?php
echo " Ville : ".$membre['ville'];?><br><?php
echo " Groupes : ".$membre['id_groupe'];?><br><?php
echo " Travail : ".$membre['travail'];?><br><?php
echo " Passion : ".$membre['passion'];?><br>
<a href="edit_profile.php">Modifier profil</a><br>
<a href="changer_mot_de_passe.php">Changer le mot de passe</a>
<?php 
}



?>