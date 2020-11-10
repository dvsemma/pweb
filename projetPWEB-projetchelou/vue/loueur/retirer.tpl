<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Exo PWeb</title>
  	<link rel="stylesheet" href="vue/styleCSS/utilisateur.css"/>
</head>

<body>

	<?php require("vue/menu/loueur.tpl"); ?>

<h1> Retirer un vehicule </h1>
	<form action="index.php?controle=loueur&action=retirerVehicule" method="post">
    
   
   
   
   
   
    <div class="container">
     <h1>Formulaires</h1>
     <form>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="c1" id="ck1">
        <label class="form-check-label" for="ck1">
   
   
   <div id="main">
	
	<?php
	<div class="container">
     <h1>Formulaires</h1>
     <form>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="c1" id="ck1">
        <label class="form-check-label" for="ck1">
	
		if ($Contact != false) {
			echo ("<h2 style='color:blue'> Voici vos voitures :</h2>");
			echo ('<table>');
			echo ('<tr><th> Type </th><th> Caractéristiques </th><th> Photo </th></tr>');
			foreach ($Contact as $c) {
				$chemin =  "vue/images/" . $c['photo'];
				echo "<tr class='contact'>";
				echo ("<td>" . $c['type'] . "</td>"); // utf8_encode($c['nom']) si nécessaire
				echo ("<td>" . $c['caract'] . "</td>");
				echo ("<td> <img src=".$chemin."> </td>");
				echo "</tr>\n";
			}
			
			echo ('</table>');
			</label>
		}
		
	?>
	</div>
	
	
    
    
    
    
    /*
    <div class="container">
     <h1>Formulaires</h1>
     <form>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="c1" id="ck1">
        <label class="form-check-label" for="ck1">Case 1</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="c2" id="ck2">
        <label class="form-check-label" for="ck2">Case 2</label>
      </div>
      

</form> */


</body></html>
