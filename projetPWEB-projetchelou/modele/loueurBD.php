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


function ajouter($type, $caract, $photo) {
	require('modele/connectBD.php'); //$pdo est défini dans ce fichier

	$sql='INSERT INTO vehicule(type, caract,location, photo) VALUES(:type,:caract,"disponible", :photo)';
	$req = $pdo->prepare($sql);
	$req->execute(array(
		'type' => $type,
		'caract' => $caract,
		'photo' => $photo,
	));
}


function retirer($id){
	require('modele/connectBD.php'); //$pdo est défini dans ce fichier

	$sql='DELETE FROM Vehicule  WHERE id=:id';
	$req = $pdo->prepare($sql);
	$req->bindParam(':id', $id);
	$req->execute();


}

?>
