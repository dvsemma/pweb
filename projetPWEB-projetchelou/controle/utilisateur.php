<?php
	/*controleur utilisateur.php :
		fonctions-action de gestion des utilisateurs
	*/

	function ident () {
		$email = isset($_POST['email'])?trim($_POST['email']):'';
		$mdp = isset($_POST['mdp'])?trim($_POST['mdp']):'';
		$msg = "";
		$nom = 'SELECT nom FROM client c	WHERE c.id =: session_id() ';


		require("./modele/utilisateurBD.php");


		if (count($_POST)==0)
			require("vue/utilisateur/ident.tpl");

		else {
			if ($bool = verifS_ident($email, $mdp, $err) && verif_bd($email, $mdp, $profil)) { //$bool=verifS_ident($nom, $num, $err)) &&
				//echo ('<br />PROFIL : <pre>'); print_r ($profil); echo ('</pre><br />'); die("ident");
				if ($email == "loueur@voitures.com") {
					$_SESSION['profil'] = $profil;
					$nexturl = "index.php?controle=loueur&action=stock";
					header("Location:" . $nexturl); // On retourne à la page index !!!
				}
				else {
				//session_start(); //fait dans index
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=utilisateur&action=accueil";
				header("Location:" . $nexturl); // On retourne à la page index !!!
				}
			}
			else {
				if (!$bool)
					$msg = $err;
				else
					$msg = "Utilisateur inconnu !";
				require("vue/utilisateur/ident.tpl");
			}
		}
	}





	function inscription () {
		$email = isset($_POST['email'])?trim($_POST['email']):'';
		$mdp = isset($_POST['mdp'])?trim($_POST['mdp']):'';
		$nom = isset($_POST['nom'])?trim($_POST['nom']):'';
		$msg = "";


		require("./modele/utilisateurBD.php");

		if  (count($_POST)==0)
								require("./vue/utilisateur/inscription.tpl") ;
		else {
				if  (!verif_ident($nom,$email,$mdp,$profil)) {
						$msg ="Erreur de saisie";
						require("./vue/utilisateur/inscription.tpl") ;
			}
				else {
				inscrire($nom,$email,$mdp);
				$_SESSION['profil'] = $profil;
				$nexturl = "index.php?controle=utilisateur&action=accueil";
				header("Location:" . $nexturl); // On retourne à la page index !!!

			}
		}
}






	function accueil() {
		require("modele/contactBD.php");
		$idn = session_id(); //$_SESSION['profil']['id'];
		$Contact = contactsBD($idn);
		require("vue/utilisateur/accueil.tpl");
		}




	function verif_ident($nom,$email,$mdp,&$profil) { // verification des parametres pour une inscription

		//Traitement du formulaire
		   if(isset($_POST['nom'],$_POST['email'],$_POST['mdp'])){

	           //Contraintes à vérifier

	           //Champ nom vide
	           if(empty($_POST['nom'])){
	               echo "Le champ nom est vide.";
								 return false;
	           }

	           //vérification de la taille du nom : ne dépasse pas 25 caractères
	           elseif(strlen($_POST['nom'])>100){
	               echo "Le nom est trop long, il dépasse 100 caractères.";
								  return false;
	           }

	           //champ email vide
	           elseif(empty($_POST['email'])){
	               echo "Le champ email est vide.";
								  return false;
	           }

	           //vérification de la validité du mail
	           elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	               echo "L'adresse mail est invalide";
	           }

	           //Champ nom vide
	           if(empty($_POST['mdp'])){
	               echo "Vous n'avez pas renseigné de mot de passe.";
								  return false;
	           }

	           //vérification de la taille du nom : ne dépasse pas 25 caractères
	           elseif(strlen($_POST['mdp'])<4){
	               echo "Votre mot de passe est trop court.";
								  return false;
	           }

						 else return true;

	          //vériffication qu'il n'y a pas de doublon

	          /* else{
							 	require('modele/connectBD.php');
	               $req = $pdo->prepare('SELECT nom, email FROM client WHERE nom=:nom AND email=:email');
								 $req->bindParam(':email', $email);
								 $req->bindParam(':mdp', $mdp);
								 $req->execute();

	             //  $reponse = $req->fetch(PDO::FETCH_ASSOC);

	               // Vérification que le nom et numéro de matricule ne sont pas déjà utilisés
	                if($req){

	                    echo "Le nom et l'email' sont déjà utilisés.";
	                    return false;
	                }

	               //si c'est bon, l'inscription est effectuée
	               else{
	                   return true;
	               }

	           } */
	       }

	    }






	// vérification syntaxique des saisies
	// nom : composé de caractères alphanumériques et du tiret, chaîne non vide de 30 caractères maximum
	// num : composé de caractères alphanumériques, à raison de 6 à 8 caractères
	// En cas d'erreur, une information sur l'erreur est retournée dans $err
	function verifS_ident($nom, $num, &$err) {
	/*	if (!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $nom)) {
			$err = 'erreur de syntaxe sur le nom';
			return false;
		}
		if (!preg_match("`^[[:alpha:][:digit:]]{2,8}$`", $num)) {
			$err = 'erreur de syntaxe sur l\'identifiant.';
			return false;
		} */
		return true;
	}

	function bye() {

		session_destroy();
		$nexturl = "index.php?controle=utilisateur&action=ident";
		header("Location:" . $nexturl); // On retourne à la page index !!!
	}

	function ajout_u()  {
		echo ("ajout_u ::");
	}
	function maj_u() {
		echo ("maj_u ::");
	}
	function destr_u ()  {
		echo ("destr_u ::");
	}
