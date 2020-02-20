<?php
session_start();
// Suppression des variables de session et de la session
$_SESSION =array();
session_destroy();
// Suppression des cookies de connexion automatique
setcookie('pseudo','');
setcookie('pass_hach','');
//pas de echo avant le setcookie ou code ou saut de ligne avant session_start
header('Location:inscription.php')
?>