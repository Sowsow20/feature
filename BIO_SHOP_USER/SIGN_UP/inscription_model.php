<?php 
try
{

 $bdd= new PDO('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('Error '.$e->getMessage());
}

$res = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');

$res->execute(array($_POST['pseudo']));



function hachePassword($hash)
{
	global $bdd;
		$req = $bdd->prepare('INSERT INTO membres(pseudo,pass,email,date_inscription) VALUES(?,?,?,?) ');
		$req->execute(array($_POST['pseudo'],$hash,$_POST['email'],date("Y-m-d H:i:s")));
}





		$id_res = $bdd->query('SELECT id FROM membres WHERE pseudo = "'.$_POST['pseudo'].'" ');


function updateIdUser($cle,$id)
{


global $bdd;
	$req= $bdd->prepare('UPDATE membres SET clé = ? WHERE id = ?');
	$req->execute(array($cle,$id));	
}

		


 