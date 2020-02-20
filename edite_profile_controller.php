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
?>
<?php

	
		if($_POST['pseudo']== null)
		{
		echo "Pseudo invalide";
		}
		else
		{

			$req= $bdd->prepare('UPDATE  membres SET pseudo = ? WHERE id = ?');
			if($req->execute(array($_POST['pseudo'],$_SESSION['id'])))
				{
					echo "Votre nom a bien été modifié";
				}
        }


?>