
<?php


function payer(){
  $type = isset($_POST['type'])?trim($_POST['type']):'';
  $id = session_id();
  $msg = "";


  require("./modele/aboBD.php");
  require("./modele/contactBD.php");



  if  (count($_POST)==0){
              $Contact = contactsBD($id);
              require("./vue/utilisateur/payer.tpl") ;
  }
  else {
      if  (!verif_carte($nom,$email,$mdp,$profil)) {
          $msg ="Les coordonnées banquaires fournies sont incorrectes";
          require("./vue/utilisateur/payer.tpl") ;
    }
      else {
      payer($idv, $ide);
      $nexturl = "index.php?controle=utilisateur&action=payer";
      header("Location:" . $nexturl); // On retourne à la page index !!!

    }
  }

}






function louer(){
  $id = isset($_POST['id'])?trim($_POST['id']):'';
  $DateD = isset($_POST['DateD'])?trim($_POST['DateD']):'';
  $DateF = isset($_POST['DateF'])?trim($_POST['DateF']):'';
  $msg = "";
  //var_dump($id);


  require("modele/contactBD.php");
  require("./modele/aboBD.php");

  if  (!$_POST){
              $Contact = voituresDispo();
              require("./vue/utilisateur/louerVoiture.tpl") ;
            }
  else {
      if  (!verif_loc($id,$DateD,$DateF)) {
          $msg ="Erreur de saisie";
          require("./vue/utilisateur/louerVoiture.tpl") ;
    }
      else {
      //  foreach ($_POST['id'] as $client){
      //    $idv = $client;
        louerVoiture($id,$DateD,$DateF);
      //  }
        echo "Votre location est confirmée!";
        $Contact = voituresDispo();
        require("./vue/utilisateur/louerVoiture.tpl") ;
     // On retourne à la page index !!!

   }
  }
}



function verif_loc($id,$DateD,$DateF) {

  if(isset($_POST['id'],$_POST['DateD'],$_POST['DateF'])){

        //Contraintes à vérifier

        //Champ nom vide
        if(empty($_POST['id'])){
            echo "Vous n'avez pas sélectionné de véhicule.";
            return false;
        }


        //champ email vide
        elseif(empty($_POST['DateD'])){
            echo "Vous n'avez pas séléctionné de date de début.";
             return false;
        }

        else return true;

    }


}


?>
