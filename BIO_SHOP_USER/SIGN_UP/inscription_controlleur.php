
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
require "vendor/phpmailer/phpmailer/src/PHPMailer.php"; 
require 'inscription_model.php';
//verification de la validité des informations
/*Le pseudonyme demandé par le visiteur est-il libre ? S'il est déjà présent en base de données, il faudra demander au visiteur d'en choisir un autre.

Les deux mots de passe saisis sont-ils identiques ? S'il y a une erreur, il faut inviter le visiteur à rentrer à nouveau le mot de passe.


L'adresse e-mail a-t-elle une forme valide ? Vous pouvez utiliser une expression régulière pour le vérifier.
*/

    	
	// Ma clé privée
	$secret = "6Lfkxs0UAAAAAA5aeV3lWKSkMXC8X_AGMDcgqf3h";
	// Paramètre renvoyé par le recaptcha
	$response = $_POST['g-recaptcha-response'];
	// On récupère l'IP de l'utilisateur
	$remoteip = $_SERVER['REMOTE_ADDR'];
	
	$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
	    . $secret
	    . "&response=" . $response
	    . "&remoteip=" . $remoteip ;
	
	$decode = json_decode(file_get_contents($api_url), true);
	
	/*if ($decode['success'] == true) {
		// C'est un humain
		echo "true : humain ";

	}
	
	else {
		// C'est un robot ou le code de vérification est incorrecte
		echo "false : robot";
		echo "res ". $response;
	}*/
		


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
		hachePassword($hash);
		

/*
Récupération du login et de l'adresse mail du prétendant ;
Génération aléatoire d'une clé et stockage de celle-ci dans la base de données ;
Envoi du mail contenant la procédure à suivre pour l'activation ;
Avertissement à l'utilisateur qu'un mail vient de lui être envoyé pour confirmer son inscription.
*/

 $cle =null;


 if($id_array =$id_res->fetch())
 {
	global $cle;
 	$id = $id_array['id'];
 	$cle=md5(uniqid(rand(), true)); 
	updateIdUser($cle, $id);

 } 

$mail = new PHPMailer(true);
$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';     // Specify main and backup server
$mail->Port = 587; 
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true; 
$mail->SMTPAutoTLS = true;

$mail->Password='sublime92';
$mail->Username=$_POST['email']; 

 // $mail->SMTPDebug = 2; pour voir un peu plus sur l'etat du mail erreur ....debuggage 
$mail->From = $_POST['email'];
$mail->FromName = "naim chiter";

//To address and name
//$mail->addAddress("recepient1@example.com", "Recepient Name");//Recipient name is optional
$mail->addAddress("naimchiter@gmail.com"); 

//Address to which recipient will reply
$mail->addReplyTo("naimchiter@gmail.com", "Reply");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "<b>confirmation</b> inscription sur le site ";
$mail->Body = "<i>Bienvenue sur le site,</i><br>Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller sur votre navigateur Internet. <div> <a href=\"http://localhost:8888/FirstWebSite/Methode_PDO/espace_membres/confirmation_inscription.php?cle=$cle\">Here the link</a>
                           </div>";
$mail->AltBody = "This is the plain text version of the email content";

require "inscription_view.php";


		///////












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

</body>
</html>

