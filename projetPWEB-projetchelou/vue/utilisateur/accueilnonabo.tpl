<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TP econtact - mvc - page d'accueil avec liste des contacts</title>

		<link rel="stylesheet" href="./vue/styleCSS/style.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateur.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/contact.css"/>
		<!-- <script src="script.js"></script> -->
	</head>

	<body>

			<?php require ("vue/menu/nonabo.tpl");?>

		<h1> Bienvenue sur notre site! </h1>
    	<h2> Veuillez vous connecter pour pouvoir louer un vehicule. </h2>





		<div id="main">
			<?php
				if ($Contact != false) {
					echo ("<h2 style='color:blue'> Voici les voitures disponibles à la location :</h2>");
					echo ('<table>');
					echo ('<tr><th> Type </th><th> Caractéristiques </th><th> Photo </th></tr>');
					foreach ($Contact as $c) {
						$chemin =  "vue/images/" . $c['photo'];
						echo "<tr class='contact'>";
						echo ("<td>" . $c['type'] . "</td>"); // utf8_encode($c['nom']) si nécessaire
						echo ("<td>" . $c['caract'] . "</td>");
						echo ("<td> <img src=".$chemin." width='175px' height='...'> </td>");
						echo "</tr>\n";
					}
					echo ('</table>');
				}
				else echo ('Pas de voitures disponibles à la location.');


			?>
		</div>




	</body>
</html>
