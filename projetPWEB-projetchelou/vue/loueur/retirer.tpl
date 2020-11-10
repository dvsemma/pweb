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

	<?php
  	if ($Contact != false) {

			foreach ($Contact as $c) {
        echo  ('<input name="id" class="form-check-input" type="checkbox" value="c1" id="ck1">');
        echo ('<label class="form-check-label" for="ck1"></label>');
				$chemin =  "vue/images/" . $c['photo'];
				echo ( $c['type'] . "  -  " . $c['caract'] . "   <img src=".$chemin."> <br>" );
			}

		}

	?>
  <input type= "submit"  value="Retirer">

</form>
	</div>






    <!--
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


</form>
-->

</body></html>
