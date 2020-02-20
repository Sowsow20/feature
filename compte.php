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
		
	
<div class="en_tete">
<label class="magasin">Magasin TOTO</label>



<div class="middle_div">
	<a href="profil.php">
<label class="email"><?php echo $resultat['email']; ?></label>
<!--<label class="pseudo"><?php echo $resultat['pseudo']; ?></label>-->
</a></div>

<div class="right_div">
<img class= "avatar" src="image/<?php echo $resultat['pseudo']; ?>.png">
<img  class ="panier" src="image/compte/panier.jpg"/>
<a href="deconnexion.php">
<img type ="submit" class="logout" src="image/compte/logout.png"> 
</a>
</div>
</div>	
<div class="search_zone">
<label for="search_id" class ="search_bar_label" >Entrez votre recherche ici:	</label>
<input type="search" name="search_bar" value="search...)" id="search_bar" aria-label="Search through site content">	
<img class="search_icon" src="image/compte/search.png">
</div>
<div class="menu">
	<div><a class="menu_links" href="ajout_produits.php">Ajouter un produit</a></div>
	<div><a class="menu_links" href="google.com">Bon plan du moment</a></div>
	<div><a class="menu_links" href="google.com">Mon magasin</a></div>
	<div><a class="menu_links" href="google.com">Carte et assurances</a></div>
	<div><a class="menu_links" href="google.com">Contact</a></div>

</div>
<div class="liste_produit">
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
	<img class="heart_cart" src="image/compte/wish.jpg">
	<img class="produit" src=<?php echo $data['photo'];?>>
	

	<label class="nom_produit"><?php echo $data['nom_produit'];?></label>
	<label class="prix_produit"><?php echo $data['prix_produit'];?>€</label>
	<img class="shopping_cart" src="image/compte/orange_shopping_cart.png">


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
		<label class="label_contact">Suivez-nous: </label>
		<img class="contact_image" src="image/compte/footer/facebook.png">
		<img class="contact_image" src="image/compte/footer/youtube.png">
		<img class="contact_image" src="image/compte/footer/instagram.png">
		<img class="contact_image" src="image/compte/footer/pinterest.png">
		<img class="contact_image" src="image/compte/footer/twiter.png">
	</div>
	<div class="footer_plus">
	<div class="actualite">En ce moment</div>
	<div class="promotions">Promotions</div>
	<div class="catalogues">Catalogues</div>
	<div class="drive">Toto Drive</div>		
	</div>


	
</body>
</html>

