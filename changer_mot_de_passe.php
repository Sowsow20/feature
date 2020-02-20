
<!DOCTYPE html>
<html>
<head>
	<title>edite_profile.php</title>
	<meta charset="utf-8">
</head>
<body>
<form method="POST" action="changer_mot_de_passe_controlleur.php">
<label>Mot de passe actuel </label>
<input type="password" name="password"><br>
<label>Nouveau mot de passe</label>
<input type="password" name="new_password"><br>
<label>Confirmation du nouveau mot de passe</label>
<input type="password" name="new_password_confirmation"><br>
<input type="submit" name="submit" value="Valider">
</form>
</body>
</html>