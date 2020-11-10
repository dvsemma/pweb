
<?php


function stock(){
  require("modele/loueurBD.php");
  $Contact = voituresStock();
  require("vue/loueur/stock.tpl");

}

function enLocation(){
  require("modele/loueurBD.php");
  $Contact = voitLouées();
  require("vue/loueur/enLocation.tpl");
}


function ajouterVehicule(){
  $type = isset($_POST['type'])?trim($_POST['type']):'';
  $caract = isset($_POST['caract'])?trim($_POST['caract']):'';
  $photo = isset($_POST['photo'])?trim($_POST['photo']):'';
  $msg = "";


  require("./modele/loueurBD.php");

  if  (count($_POST)==0)
              require("./vue/loueur/ajouter.tpl") ;
  else {
      if  (!verif_voiture($type,$caract,$photo)) {
          $msg ="Erreur de saisie";
          require("./vue/loueur/ajouter.tpl") ;
    }
      else {
      ajouter($type,$caract,$photo);
      echo "Un nouveau vehicule à été ajouté à votre stock!";
      $nexturl = "index.php?controle=loueur&action=ajouterVehicule";
      header("Location:" . $nexturl); // On retourne à la page index !!!

    }
  }
}

function verif_voiture($type,$caract,$photo) { // verification des parametres pour une inscription

  //Traitement du formulaire
     if(isset($_POST['type'],$_POST['caract'],$_POST['photo'])){

           //Contraintes à vérifier

           //Champ nom vide
           if(empty($_POST['type'])){
               echo "Le champ type est vide.";
               return false;
           }

           //vérification de la taille du nom : ne dépasse pas 25 caractères
           elseif(strlen($_POST['type'])>100){
               echo "Le type est trop long, il dépasse 100 caractères.";
                return false;
           }

           //champ email vide
           elseif(empty($_POST['caract'])){
               echo "Le champ caractéristiques est vide.";
                return false;
           }

           //Champ nom vide
           if(empty($_POST['photo'])){
               echo "Vous n'avez pas séléctionné une photo.";
                return false;
           }


           else return true;


       }

       else return false;

    }



function retirerVehicule(){

  require("modele/contactBD.php");
  $Contact = voituresDispo();

  $type = isset($_POST['type'])?trim($_POST['type']):''; //comment recuperer id???
  $msg = "";

  require("modele/loueurBD.php");

  if  (count($_POST)==0)
              require("./vue/loueur/retirer.tpl") ;
  else {
    if(empty($_POST['type'])) {
          $msg ="Vous n'avez pas sélectionné de véhicule ";
          require("./vue/loueur/retirer.tpl") ;
    }
      else {
      retirer($id);
      echo "Le vehicule a bien été retiré de votre stock";
      $nexturl = "index.php?controle=loueur&action=retirerVehicule";
      header("Location:" . $nexturl); // On retourne à la page index !!!

    }
  }
}

function factures(){

}

?>
