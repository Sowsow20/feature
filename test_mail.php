<?php

try
 {
 	$bdd= new PDO('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
 catch(Exception $e) 
 {
 	die('Error : '.$e->getMessage());
 }
$res = $bdd->prepare('SELECT * FROM membres WHERE pseudo = ?');

$res->execute(array($_POST['pseudo']));
if($res->fetch()!= null)
{
?>
alert('Ce pseudo existe déjà, veuillez choisir un autre pseudonyme');
<?php
}
else
{
if($_POST['pass'] != $_POST['passconfirm'])
{
?>
alert('les mots de passe saisis sont different ');
<?php
}
else
{
	//#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#
	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
	{		//Insertion .. 
		$hash= password_hash($_POST['pass'],PASSWORD_DEFAULT);
		$req = $bdd->prepare('INSERT INTO membres(pseudo,pass,email,date_inscription) VALUES(?,?,?,?) ');
		$req->execute(array($_POST['pseudo'],$hash,$_POST['email'],date("Y-m-d H:i:s")));


/*
Récupération du login et de l'adresse mail du prétendant ;
Génération aléatoire d'une clé et stockage de celle-ci dans la base de données ;
Envoi du mail contenant la procédure à suivre pour l'activation ;
Avertissement à l'utilisateur qu'un mail vient de lui être envoyé pour confirmer son inscription.
*/

		$cle=md5(uniqid(rand(), true)); 
		$req= $bdd->prepare('UPDATE membres SET clé = ? WHERE email = ?');
		$req->execute(array($cle,$_POST['email']));
		$msg = wordwrap('Pour activer votre compte veuillez cliquer sur le lien dessous ou copier/coller dans votre navigateur internet ',70);
		$sender = 'mouhalichahinaz@gmail.com';
	 				$header="MIME-Version: 1.0\r\n";
                     $header.='From:"[VOUS]"<votremail@mail.com>'."\n";
                     $header.='Content-Type:text/html; charset="uft-8"'."\n";
                     $header.='Content-Transfer-Encoding: 8bit';
                     $message='
                     <html>
                        <body>
                           <div align="center">
                              <a href="google.fr</a>
                           </div>
                        </body>
                     </html>
                     ';

		if(mail($_POST['email'],"procédure  créé" ,$message ,$header))
			{echo "true";}
		else 
		{
			echo "false";
		}
}
	else 
	{

		?>
		alert("l\'adresse email saisie est non valide");
		<?php
	}
}
}



?>