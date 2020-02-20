<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ajout produit</title>
</head>
<body>

<form action="upload_product.php" method="post" ENCTYPE="multipart/form-data">
	<label>Nom produit : </label>
	<input type="text" name="nom_produit"><br>
	<label>Catégorie :</label>
	<input type="text" name="categorie"><br>
	<label>Prix :</	label>
	<input type="float" name="prix" min="0"><br>
	<label>Déscription :</label>
	<input type="text" name="description"><br>
	<label>Quantité :</label>
	<input type="number" name="quantite" min="0"><br>
<input type="hidden" name="max_file_size" value="50000">
<label for="title" class="float">Image : </label> 
 <input TYPE="file" name="image"><br>
 <input type="submit" name="envoyer" value="envoyer le fichier">

	
</form>

</body>
</html>