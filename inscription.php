<!DOCTYPE html>
<html>
<head>
	<title>inscription.php</title>
	<meta charset="utf-8">
	<script src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>
<form method ="POST" action="inscription_controlleur.php">
	<h1>Inscription</h1>
	<label>Pseudo</label>
	<input type="text" name="pseudo"><br>
	<label>Mot de passe</label>
	<input type="password" name="pass"><br>
	<label>Confirmation de mot de passe</label>
	<input type="password" name="passconfirm"><br>
	<label>Adresse email</label>
	<input type="text" name="email"><br>
	 <!-- Notre boite de vérification -->
          <div class="g-recaptcha" 
          data-sitekey="6Lfkxs0UAAAAADl1kF1-R6JlbnQHFgaiP-H5SLtL">
          </div> <br>
	<button type="submit">Valider </button><br> <br>
<h1>Connexion</h1>
 Pour se connecter veuillez clique sur ce lien :  <a href="connection.php">Se connecter</a>
</form>


</body>
</html>