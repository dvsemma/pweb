<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Exo PWeb</title>
  	<link rel="stylesheet" href="vue/styleCSS/utilisateur.css"/>
</head>

<body>

	<?php require("vue/menu/nonabo.tpl"); ?>

<h1> Inscription </h1>
	<form action="index.php?controle=utilisateur&action=inscription" method="post">
    Nom de l'entreprise
    <br>
    <input 	name="nom" 	type="text" value= "">
    E-mail
    <br/>

    <input  name="email"  type="text"  value= "">
    Mot de passe
    <br/>

    <input  name="mdp"  type="password"  value= "">
    <br/>


    <input type= "submit"  value="S'inscrire">

</form>


</body></html>
