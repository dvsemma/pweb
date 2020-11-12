<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projet Pweb, page permettant de payer pour la voiture choisie</title>

		<link rel="stylesheet" href="./vue/styleCSS/style.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/utilisateur.css"/>
		<link rel="stylesheet" href="./vue/styleCSS/contact.css"/>
		<!-- <script src="script.js"></script> -->
	</head>

	<body>

			<?php require ("vue/menu/abo.tpl");?>

		<h1> Factures </h1>


  <h1> Veuillez choisir la voiture pour laquelle vous voulez payer:</h1>

		<form action="index.php?controle=abo&action=payer" method="post">

                <SELECT name="type" size=1>
            	<?php
              foreach ($Contact as $c) {
                    echo('<OPTION>' . $c['type'] . '</OPTION>');
              }
              ?>
                </SELECT>


                <fieldset>
    <legend>Informations CB</legend>
    <ol>
      <li>
        <fieldset>
          <legend>Type de carte bancaire</legend>
          <ol>
            <li>
              <input id=visa name=type_de_carte type=radio>
              <label for=visa>VISA</label>
            </li>
            <li>
              <input id=amex name=type_de_carte type=radio>
              <label for=amex>AmEx</label>
            </li>
            <li>
              <input id=mastercard name=type_de_carte type=radio>
              <label for=mastercard>Mastercard</label>
            </li>
          </ol>
        </fieldset>
      </li>
      <li>
        <label for=numero_de_carte>NÂ° de carte</label>
        <input id=numero_de_carte name=numero_de_carte type=number required>
      </li>
      <li>
        <label for=securite>Code sécurité</label>
        <input id=securite name=securite type=number required>
      </li>
      <li>
        <label for=nom_porteur>Nom du porteur</label>
        <input id=nom_porteur name=nom_porteur type=text placeholder="Même nom que sur la carte" required>
      </li>
    </ol>
  </fieldset>





								<input type= "submit"  value="Payer">

    </form>




			?>
		</div>






	</body>
</html>
