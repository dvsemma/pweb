<?php
	/* Fonctions-modèle réalisant les requètes de gestion des contacts en base de données */

	// contactsBD : retourne la liste des informations pour chaque contact de l'utilisateur $id

	function contactsBD($idn) {
		require ("Modele/connectBD.php") ;


		$sql = 'SELECT type, caract, photo FROM vehicule v, facturation f
		WHERE f.ide=:id AND now() BETWEEN f.dateD AND f.dateF'; //(to_date(sysdate,"DD/MM/YYYY")
	/*	$sql = 'SELECT type, caract, photo, FROM vehicule v
		WHERE v.location=:id'; // LIMIT ne marche pas en MS SQL SERVER */
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':id', $idn);
			$bool = $commande->execute();
			$C = array(); // Instanciation du tableau destiné à la vue...
			if ($bool) {
				while ($l = $commande->fetch()) {
					$C[] = $l; //stockage dans $C des enregistrements sélectionnés
				}
			}
		}
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $C; // retourne un tableau (ou on aurait pu le passer par ref)
	}


function voituresDispo() {
	require ("Modele/connectBD.php") ;


	$sql = 'SELECT type, caract, photo FROM vehicule v
	WHERE v.location LIKE "disponible"'; //(to_date(sysdate,"DD/MM/YYYY")
/*	$sql = 'SELECT type, caract, photo, FROM vehicule v
	WHERE v.location=:id'; // LIMIT ne marche pas en MS SQL SERVER */
	try {
		$commande = $pdo->prepare($sql);
		$bool = $commande->execute();
		$C = array(); // Instanciation du tableau destiné à la vue...
		if ($bool) {
			while ($l = $commande->fetch()) {
				$C[] = $l; //stockage dans $C des enregistrements sélectionnés
			}
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	return $C; // retourne un tableau (ou on aurait pu le passer par ref)


}


?>
