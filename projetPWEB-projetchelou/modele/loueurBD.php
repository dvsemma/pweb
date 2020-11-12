<?php
function voituresStock() {
	require ("Modele/connectBD.php") ;


	$sql = 'SELECT * FROM vehicule v'; //(to_date(sysdate,"DD/MM/YYYY") //ON A QUOI DANS LE STOCK
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


function ajouter($type, $caract,$prix, $photo) {
	require('modele/connectBD.php'); //$pdo est défini dans ce fichier

	$sql='INSERT INTO vehicule(type, caract,prix,location, photo) VALUES(:type,:caract, :prix, "disponible", :photo)';
	$req = $pdo->prepare($sql);
	$req->execute(array(
		'type' => $type,
		'caract' => $caract,
		'prix' => $prix,
		'photo' => $photo,
	));
}


function retirer($id){
	require('modele/connectBD.php'); //$pdo est défini dans ce fichier

	$sql='DELETE FROM vehicule  WHERE id=:id';
//	$req = $pdo->prepare($sql);
	//$req->bindParam(':id', $id);
//	$req->execute();

	try {
		$req = $pdo->prepare($sql);
		$req->bindParam(':id', $id);
		$idv = $req->execute();

	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}



function getIdVoiture($type){
		require('modele/connectBD.php');
		$sql = 'SELECT id FROM vehicule WHERE type=:type';
	//	$req = $pdo->prepare($sql);
	//	$req->bindParam(':type', $type);
	//	$req->execute();
	//	$idv = $req->fetch();
	//	return $idv;


	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':type', $type);
		$bool = $commande->execute();
		if ($bool) {
			$resultat = $commande->fetch(); //tableau d'enregistrements
			return $resultat;
			// var_dump($resultat); die();
			/*while ($ligne = $commande->fetch()) { // ligne par ligne
				print_r($ligne);
			}*/
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

}



function voitLouées() {
	require ("Modele/connectBD.php") ;

	$sql = 'SELECT type, caract, photo, nom FROM vehicule v, facturation f, client c
	WHERE v.id=f.idv AND  c.id=f.ide AND now() BETWEEN f.dateD AND f.dateF'; //(to_date(sysdate,"DD/MM/YYYY")
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
	return $C;  // retourne un tableau (ou on aurait pu le passer par ref)

/*	$sql = 'SELECT nom, id, ide FROM client c , facturation f
	WHERE c.id=f.ide AND f.idv=:idv'; //(to_date(sy
	$idv = getIdVoiture($c['type']);
	$req = $pdo->prepare($sql);
	$req->bindParam(':idv', $idv);
	$entreprise = $req->execute(); */

	return $entreprise;

}





function getClients(){
	require ("Modele/connectBD.php") ;

	$sql = 'SELECT nom FROM client WHERE id>1'; //(to_date(sysdate,"DD/MM/YYYY") //ON A QUOI DANS LE STOCK
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


function getFacture($client){
	require ("Modele/connectBD.php") ;


	$id = 'SELECT id FROM client WHERE nom=$client';
	$sql = 'SELECT idv FROM facturation WHERE ide=:id '; //(to_date(sysdate,"DD/MM/YYYY") //ON A QUOI DANS LE STOCK
/*	$sql = 'SELECT type, caract, photo, FROM vehicule v
	WHERE v.location=:id'; // LIMIT ne marche pas en MS SQL SERVER */
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$bool = $commande->execute();
		$F = array(); // Instanciation du tableau destiné à la vue...
		if ($bool) {
			while ($l = $commande->fetch()) {
				$F[] = $l; //stockage dans $C des enregistrements sélectionnés
			}
		}
	}

	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
//return $C; // retourne un tableau (ou on aurait pu le passer par ref)




	if (count($F)<10){
	$voit = 'SELECT type, photo, prix, etat FROM vehicule v, facturation f WHERE f.idv=:idv AND f.idv=v.id';

	/*	$sql = 'SELECT type, caract, photo, FROM vehicule v
		WHERE v.location=:id'; // LIMIT ne marche pas en MS SQL SERVER */
		try {
			$commande = $pdo->prepare($voit);
			$commande->bindParam(':idv', $f['idv']);
			$bool = $commande->execute();
			$V = array(); // Instanciation du tableau destiné à la vue...
			if ($bool) {
				while (count($F)!=0) {
					$l = $commande->fetch();
					$V[] = $l; //stockage dans $C des enregistrements sélectionnés
				}
			}
		}

		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
		return $V;








	/*	foreach ($F as $f){
		 $voit = 'SELECT type, photo, prix, etat FROM vehicule v, facturation f WHERE idv=$f["idv"]';

					 try {
						 $commande = $pdo->prepare($voit);
					//	 $commande->bindParam(':id', $id);
						 $bool = $commande->execute();
						 $V = array();
						 if ($bool) {
							 		$l = $commande->fetch()
								  $V[] = $l; //stockage dans $C des enregistrements sélectionnés

						 }
					 }

					 catch (PDOException $e) {
						 echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
						 die(); // On arrête tout.
					 }*/

	}
}




?>
