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

  
  <h1> Veuillez choisir la voiture pour laquelle vous voulez payer:</h1>

		<form action="index.php?controle=abo&action=payer" method="post">
                
                <SELECT name="type" size=1>
            	<?php    
              foreach ($Contact as $e) {
                    echo('<OPTION>' . $e['type'] . '</OPTION>');
              } 	
              ?>
                </SELECT>
                
                
                
                <fieldset>
    <legend>Informations CB</legend>

        <fieldset>
          <legend>Type de carte bancaire</legend>

              <input id=visa name=type_de_carte type=radio>
              <label for=visa>VISA</label>
	      
              <input id=amex name=type_de_carte type=radio>
              <label for=amex>AmEx</label>

              <input id=mastercard name=type_de_carte type=radio>
              <label for=mastercard>Mastercard</label>


        </fieldset>

        <label for=numero_de_carte>N° de carte</label>
        <input id=numero_de_carte name=numero_de_carte type=number required>

        <label for=securite>Code sécurité</label>
        <input id=securite name=securite type=number required>

        <label for=nom_porteur>Nom du porteur</label>
        <input id=nom_porteur name=nom_porteur type=text placeholder="Même nom que sur la carte" required>


  </fieldset>
                
                
                
                
                
								<input type= "submit"  value="Payer">
               
    </form>
    
   


			?>
		</div>
    
    
    
    


	</body>
</html>
