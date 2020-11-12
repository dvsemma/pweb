
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
  $prix = isset($_POST['prix'])?trim($_POST['prix']):'';
  $photo = isset($_POST['photo'])?trim($_POST['photo']):'';
  $msg = "";


  require("./modele/loueurBD.php");

  if  (count($_POST)==0)
              require("./vue/loueur/ajouter.tpl") ;
  else {
      if  (!verif_voiture($type,$caract,$prix,$photo)) {
          $msg ="Erreur de saisie";
          require("./vue/loueur/ajouter.tpl") ;
    }
      else {
      ajouter($type,$caract,$prix,$photo);
      echo "Un nouveau vehicule à été ajouté à votre stock!";
      require("./vue/loueur/ajouter.tpl") ;

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
  //$Type = $_POST['type'];
  $Ident = isset($_POST['id']); //comment recuperer id???
  $msg = "";

  require("modele/contactBD.php");
  require("modele/loueurBD.php");


  if  (!$_POST) {
              $Contact = voituresDispo();
              require("./vue/loueur/retirer.tpl") ;
  }
  else {
    if(!$_POST['id']) {
          echo "Vous n'avez pas sélectionné de véhicule ";
            $Contact = voituresDispo();
          require("./vue/loueur/retirer.tpl") ;
    }
      else {
        foreach($_POST['id'] as $t){
            $id = $t;
          //  $id = getIdVoiture($voit);
            retirer($id);
        }

      echo "Le (les) vehicule(s) a (ont) bien été retiré(s) de votre stock";
      $Contact = voituresDispo();
      require("./vue/loueur/retirer.tpl") ;
      //}

    }
  }
}


function factures(){
  $client = isset($_POST['client'])?trim($_POST['client']):''; //comment recuperer id???
  require("modele/loueurBD.php");

    if  (count($_POST)==0) {
      $Client = getClients();
      require("./vue/loueur/factures.tpl") ;
    }
    else {
        if  (empty($_POST['client'])) {
            $msg ="Vous n'avez pas saisi de client.";
            require("./vue/loueur/factures.tpl") ;
      }
        else {
        $Client = getClients();
        $Factures = getFacture($client);
        require("./vue/loueur/factures.tpl") ;
        //$nexturl = "index.php?controle=loueur&action=factures";
        //header("Location:" . $nexturl); // On retourne à la page index !!!

      }
    }




}

?>
