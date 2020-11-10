
<?php


function louer(){
  require("modele/contactBD.php");
  $idn = session_id(); //$_SESSION['profil']['id'];
  $Contact = voituresDispo();
  require("vue/utilisateur/louerVoiture.tpl");

}






?>
