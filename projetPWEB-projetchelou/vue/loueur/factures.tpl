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

		<h1> Factures </h1>

  
  <h1> Veuillez choisir l'entreprise pour laquelle vous voulez voir les factures:</h1>

		<form action="index.php?controle=loueur&action=factures" method="post">
                
                <SELECT name="type" size=1>
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
				if ($Contact != false) {
					echo ("<h2 style='color:blue'> Voici les factures de l'entreprise que vous avez choisie:</h2>");
					echo ('<table>');
					echo ('<tr><th> Type </th><th> Prix </th><th> Etat </th></tr>');
					foreach ($Contact as $c) {
						$chemin =  "vue/images/" . $c['photo'];
						echo "<tr class='contact'>";
						echo ("<td>" . $c['type'] . "</td>"); // utf8_encode($c['nom']) si nécessaire
						echo ("<td>" . $c['prix'] . "</td>");
						echo ("<td>" . $c['etat'] . "</td>");
						echo "</tr>\n";
					}
					echo ('</table>');
				}
				else echo ('Pas de facture pour cette entreprise.');


			?>
		</div>
    
    
    
    


	</body>
</html>
