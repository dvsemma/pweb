<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Exo PWeb</title>
  	<link rel="stylesheet" href="vue/styleCSS/utilisateur.css"/>
</head>

<body>

	<?php require("vue/menu/loueur.tpl"); ?>

<h1> Ajouter un vehicule </h1>
	<form action="index.php?controle=loueur&action=ajouterVehicule" method="post">
    Type
    <br>
    <input 	name="type" 	type="text" value= "">
    Caracteristiques
    <br/>

    <input  name="caract"  type="text"  value= "">
    Photo
    <br/>

    <input  name="photo"  type="file"  value= "">
    <br/>


    <input type= "submit"  value="Ajouter">

</form>


</body></html>
