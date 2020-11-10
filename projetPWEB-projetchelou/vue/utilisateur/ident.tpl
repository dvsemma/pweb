<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TP1 contacts - mvc - formulaire d'identification</title>
		<link rel="stylesheet" href="vue/styleCSS/utilisateur.css"/>
		<!-- <script src="script.js"></script> -->
	</head>
	<body>
			<?php require ("vue/menu/nonabo.tpl");?>


		<h1> Connexion </h1>
		<form action="index.php?controle=utilisateur&action=ident" method="post">

				E-mail
				<br>
				<input  name="email"  type="text"  value= "">

				Mot de passe
				<br/>
				<input  name="mdp"  type="password"  value= "">
				<br/>


				<input type= "submit"  value="Se connecter">

		</form>

	</body>
</html>
