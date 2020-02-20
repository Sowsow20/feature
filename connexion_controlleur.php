<?php 

/*
Dernier Temps (sur votre page de connexion par exemple) :

Récupération de la valeur du champ actif dans la BDD pour le login correspondant à la demande de connexion ;
Vérification de son état (0 ou 1) ;
Autorise ou pas la connexion du membre en fonction de l'état du champ actif.
*/

try
{
$bdd=new PDO('mysql:host=localhost;dbname=Espace_Membres;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch(Exception $e)
{
die('Error'.$e->getMessage());
}

$req = $bdd->prepare('SELECT id, pass  FROM membres WHERE pseudo = ?');
$req->execute(array($_POST['pseudo']));
$user = $req->fetch();
$isPasswordCorrect = password_verify($_POST['pass'],$user['pass']);

if(!$user)
{
	echo " Mauvais identifiant ou mot de pass ";
}
else
{
if(!$isPasswordCorrect)
{
echo "Mauvais identifiant ou mot de pass ";//moins de details mieux c'est
}
else
{
session_start();
$_SESSION['id'] = $user['id'];
$_SESSION['pseudo'] = $_POST['pseudo'];
//echo "vous êtes conecté";
//header('Location: commentaires.php?id='.$_GET["id_billet"]);
setcookie('pseudo',$_POST['pseudo'],time()+3600,null,null,false,true);
setcookie('pass_hash',$user['pass'],time()+3600,null,null,false,true);
header('Location: compte.php');
}
}
	





?>