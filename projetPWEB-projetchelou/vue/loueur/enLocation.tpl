<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projet Pweb, page pour que le leur voie quelles voitures sont louées et par qui elles le sont</title>

		<link rel="stylesheet" href="./vue/styleCSS/style.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateur.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/contact.css"/>
		<!-- <script src="script.js"></script> -->
	</head>

	<body>

			<?php require ("vue/menu/loueur.tpl");?>

		<h1> Voici les voitures louées en ce moment</h1>



		<div id="main">
			<?php
				if ($Contact != false) {
					echo ("<h2 style='color:turquoise'>Voici les voitures louées en ce moment:</h2>");
					echo ('<table>');
					echo ('<tr><th> Type </th><th> Caractéristiques </th><th> Photo </th><th>Client</th></tr>');
					foreach ($Contact as $c) {
						$chemin =  "vue/images/" . $c['photo'];
						echo "<tr class='contact'>";
						echo ("<td>" . $c['type'] . "</td>"); // utf8_encode($c['nom']) si nécessaire
						echo ("<td>" . $c['caract'] . "</td>");
						echo ("<td> <img src=".$chemin." width='150px' height='...'> </td>");
            echo ("<td>" . $c['nom'] . "</td>");
						echo "</tr>\n";
					}
					echo ('</table>');
				}
				else echo ('Pas de voitures en cours de location.');


			?>
		</div>
	</body>
</html>
