<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
</head>
<body style=" width: 100%; height:100%;">
<div style="background-color:  #c2fdcc; color:white; margin:auto; width: 80%; text-align: center;">
	
<?php 

if(!$mail->send()) 
{
   echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Merci pour votre inscription </br> À fin d'activer votre compte <strong>Veuillez cliquer sur le lien se trouvant dans le mail que nous vous avons envoyé sur votre boite mail</strong>";
}

?>
</div>
</body>
</html>


