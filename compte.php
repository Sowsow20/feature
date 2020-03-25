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

?>

<?php

//echo 'Bonjour '.$_SESSION['pseudo'].', et bienvenu sur votre compte personnel'; 
/*
<?php
if(!empty($_POST['envoyer'])) {
    echo "Bonjour !";
    // ou echo afficher();
}
?>
 
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="submit" id="envoyer" name="envoyer" value="envoyer">
<form>


si je fais <button onclick="coco()">Déconnexion</button> le navigateur comprend quil a a apeeler une fonction javascript onclick et et non pas une fonction php 
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>compte.php</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="compte_styl.css">
</head>
<body>
		
	
<header class="en_tete">
<label class="magasin">Magasin TOTO</label>



<input type="search" name="search_bar"  value="Pain, oeufs, ampoules ..." id="search_bar" aria-label="Search through site content">	

<!--<input id="chercher" type="button" name="search" value="rechercher">-->

<!--
<div class="middle_div">
	<a href="profil.php" class="email">
<label ><?php //echo $resultat['email']; ?></label>
<!--<label class="pseudo"><?php //echo $resultat['pseudo']; ?></label>
</a>
</div>
-->
<nav class="right_div">
<img  class ="panier" src="image/compte/panier_paint.png"/>
<a href="deconnexion.php">
	<!--<img class= "avatar" src="image/<?php //echo $resultat['pseudo']; ?>.png">-->
	<img  class="user_icon" src="image/compte/user_icon.png">
</a>

</nav>
</header>	





<div class="menu">
	<a class="menu_links" href="ajout_produits.php">Boisson</a>
	<a class="menu_links" href="ajout_produits.php">Alimentation Bébé</a>
	<a class="menu_links" href="ajout_produits.php">Entretien</a>
	<a class="menu_links" href="ajout_produits.php">Epicerie sucrée</a>
	<a class="menu_links" href="ajout_produits.php">Epicerie salée</a>
	<a class="menu_links" href="google.com">Santé</a>
	<!--<a class="menu_links" href="magasin.php">Beauté & Hygiène</a>-->
</div>
<div class="rayon">

<label class="rayon_title">Notre rayon Boisson</label>
</div>


<div >
<?php
$req = $bdd->query('SELECT * FROM produits');

if($data = $req->fetch())
{
?>
<div class="divv">
	<?php
while($data = $req->fetch())
{
	?>

<div class="produit_item">

	<label class="description_produit"><?php echo $data['description'];?></label>
	
	<img class="produit" src=<?php echo $data['photo'];?>>
	

	<label class="nom_produit"><?php echo $data['nom_produit'];?></label>
	<label class="prix_produit"><?php echo $data['prix_produit'];?>€</label>
	<img class="shopping_cart" src="image/compte/orange_shopping_cart.png">
<img class="heart_cart" src="image/compte/wish.jpg">

</div>	

 <?php 

}
?>
	
</div>

<?php
}



?>	

</div>


	<div class="footer">
		<div class="label_contact">Nous suivre: </div>
		<img class="contact_image" src="image/compte/footer/facebook.png">
		<img class="contact_image" src="image/compte/footer/youtube.png">
		<img class="contact_image" src="image/compte/footer/instagram.png">
		<img class="contact_image" src="image/compte/footer/pinterest.png">
		<img class="contact_image" src="image/compte/footer/twiter.png">
	</div>
	<div class="footer_plus">
	<div class="footer_plus_1">
	<div> <label class="apropos">A propos de Toto</label> </div>
	<div><a class="information" href="ajout_produits.php">Qui sommes-nous?</a></div>
	<div><a class="information" href="magasin.php">Conditions générales de vente</a></div>
	<div><a class="information" href="magasin.php">Mentions légales</a></div>
	<div> <a class="information" href="magasin.php">Protection des données</a></div>
	<div> <a class="information" href="magasin.php">Rejoignez-nous</a></div>	
	<div> <a class="information" href="magasin.php">Contrôler mes cookies</a></div>	
	</div>

<div class="footer_plus_2">
<div>
	<label class="apropos">
Recevez notre newsletter</label>
</div>
<div>
	<p class="information">Pour suivre l’actualité du Bio,les promos, nouveautés... inscrivez-vous : </p>
<div>
	<input type="text" class="mail_inscription" name="email_inscription" value="votre adresse email" />
	<input type="button"  class="ok" name="ok" value="ok" />
</div>
</div>

</div>
<div class="footer_plus_3">
<div>
<div><label class="apropos">Pour les particuliers</label></div>
<div><a class="information" href="magasin.php">Informations livraison</a></div>
<div><a class="information" href="magasin.php">Livraisons internationales</a></div>
<div><a class="information" href="magasin.php">Suivre votre commande</a></div>
</div>
<br>
<div >
<div><label class="apropos">Pour les professionnels</label></div>
<div><a class="information" href="">Presse et media</a></div>
<div><a class="information" href="">Fournisseurs</a></div>
</div>

</div>
</div>


<div class="copyrights">
	© 2020-2021 Toto - Tous droits réservés
</div>
<div class="copyrights">Avis Toto - Toto Magazine </div>
<div class="nos_partenaires">
Nos partenaires :</div>
	


<!--
	<div class="footer_plus">
	<div class="actualite">A propos de Toto</div>
	<div><a class="menu_links" href="ajout_produits.php">Ajouter un produit</a></div>
	<div><a class="menu_links" href="magasin.php">Mon magasin</a></div>
	<div class="promotions">Promotions</div>
	<div class="catalogues">Catalogues</div>
	<div class="drive">Toto Drive</div>		
	</div>
-->
</body>
</html>

