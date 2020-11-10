<?php
	/*Fonctions-modèle réalisant les requètes de gestion des utilisateurs en base de données*/

	// verif_bd : fonction booléenne.
	// Si vraie, alors le profil de l'utilisateur est affecté en sortie à $profil

	function verif_bd($email,$mdp,&$profil) {
		require('modele/connectBD.php'); //$pdo est défini dans ce fichier
		$sql='SELECT email, mdp FROM client WHERE email=:email AND mdp=:mdp';
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':email', $email);
			$commande->bindParam(':mdp', $mdp);
			$bool = $commande->execute();
			if ($bool) {
				$resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
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
		if (count($resultat) == 0) {
			$profil = array(); // Pour qu'il y ait quand même quelque chose...
			return false;
		}
		else {
			$profil = $resultat[0]; // 0 donc 1ere ligne...
			//var_dump($profil);
			return true;
		}
	}



	function inscrire($nom,$email,$mdp) { //remettre profil??
		require('modele/connectBD.php'); //$pdo est défini dans ce fichier

		$sql='INSERT INTO client(nom, mdp, email) VALUES(:nom,:mdp,:email)';
		$req = $pdo->prepare($sql);
		$req->execute(array(
			'nom' => $nom,
			'email' => $email,
			'mdp' => $mdp,
		));
	} 


?>
