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

if($_POST['new_password'] == null OR $_POST['new_password_confirmation'] == null OR $_POST['password']== null)
{
	echo "Vérifier que vous avez remplie tous les champs du formulaire et réesseyer";
}
	else 
	{
	//bdd
	$req = $bdd->query('SELECT pass FROM membres WHERE id = '.$_SESSION['id']);
	$password = $req->fetch();
	if(!password_verify($_POST['password'], $password['pass']))
		{
			echo "mauvais mot de passe ";
		}
		else 
		{
		if($_POST['new_password']!= $_POST['new_password_confirmation'])
		{
		echo "les deux mots de passe saisie ne sont pas identique";
		}
			else
			{
				$hash= password_hash($_POST['new_password'],PASSWORD_DEFAULT);
				$req= $bdd->prepare('UPDATE  membres SET pass = ? WHERE id = ?');
				if($req->execute(array($hash, $_SESSION['id'])))
					{
						echo "le mot de passe a bien été modifié";
					}


			}	
}	


}


?>