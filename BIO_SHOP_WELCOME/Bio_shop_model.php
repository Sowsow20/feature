<?php 
if(!isset($_SESSION))
{
session_start();
}
try
{
	$bdd= new PDO ('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
die('ERROR '.$e->getMessage());
}

$res=$bdd->query('SELECT * FROM membres WHERE id = '.$_SESSION['id']);

$resultat= $res->fetch();

$req = $bdd->query('SELECT * FROM produits');

if($data = $req->fetch())
{
return $data;
}

?>
16 15