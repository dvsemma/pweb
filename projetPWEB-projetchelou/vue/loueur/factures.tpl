<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projet Pweb, page permettant de voir les factures de l'entreprise choisie</title>

		<link rel="stylesheet" href="./vue/styleCSS/style.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateur.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/contact.css"/>
		<!-- <script src="script.js"></script> -->
	</head>

	<body>

			<?php require ("vue/menu/loueur.tpl");?>


  <h1> Veuillez choisir l'entreprise pour laquelle vous voulez voir les factures:</h1>

		<form action="index.php?controle=loueur&action=factures" method="post">

                <SELECT name="client" size=1 >
            	<?php
              foreach ($Client as $e) {
                    echo('<OPTION>' . $e['nom'] . '</OPTION>');
              }
              ?>
                </SELECT>

								<input type= "submit"  value="Voir la facture">

    </form>




    		<div id="main">
			<?php
				if ($Factures != false) {
					echo ("<h2 style='color:blue'> Voici les factures de l'entreprise que vous avez choisie:</h2>");
					echo ('<table>');
					echo ('<tr><th> Type </th><th> Prix </th><th> Etat </th></tr>');
					foreach ($Factures as $f) {
						$chemin =  "vue/images/" . $f['photo'];
						echo "<tr class='contact'>";
						echo ("<td>" . $f['type'] . "</td>"); // utf8_encode($c['nom']) si nécessaire
						echo ("<td>" . $f['prix'] . "</td>");
						echo ("<td>" . $f['etat'] . "</td>");
						echo "</tr>\n";
					}
					echo ('</table>');
				}
				else echo ('Pas de facture pour cette entreprise.');
        

			?>
		</div>






	</body>
</html>
