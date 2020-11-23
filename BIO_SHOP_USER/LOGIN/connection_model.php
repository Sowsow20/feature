<?php
try
{
$bdd=new PDO('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)
{
die('Error'.$e->getMessage());
}


$req = $bdd->prepare('SELECT id, pass  FROM membres WHERE pseudo = ?');
$req->execute(array($pseudo));
$user = $req->fetch();

