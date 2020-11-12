
<?php



function getIdAbo(){
  $email = $_SESSION['profil']['email'];
  $mdp = $_SESSION['profil']['mdp'];
  require('modele/connectBD.php');
  $sql="SELECT id FROM client WHERE email=:email AND mdp=:mdp";
  try {
    $req = $pdo->prepare($sql);
    $req->bindParam(':email', $email);
    $req->bindParam(':mdp', $mdp);
    $bool = $req->execute();
    if ($bool)
      $id = $req->fetch();
  }
  catch (PDOException $e) {
    echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
    die(); // On arrête tout.
  }
  return $id;
}


function louerVoiture($idv, $DateD,$DateF){
  require('modele/connectBD.php');
  require('modele/loueurBD.php'); //$pdo est défini dans ce fichier
//  $idv = getIdVoiture($type);
  $id = getIdAbo();
  //foreach ($id as $client){
    $ide = $id[0];
    $sql='INSERT INTO facturation(ide, idv, DateD, DateF, Valeur, Etat ) VALUES(:ide,:idv,:DateD, :DateF, 0, 0)';
    $req = $pdo->prepare($sql);
    $req->bindParam(':ide', $ide);
    $req->bindParam(':idv', $idv);
    $req->bindParam(':DateD', $DateD);
    $req->bindParam(':DateF', $DateF);
    $req->execute();
//  }

/*  $sql='INSERT INTO facturation(ide, idv, DateD, DateF, Value, Etat ) VALUES(:ide,:idv,:email,DateD, DateF, Value, 0)';
  $req = $pdo->prepare($sql);
  $req->bindParam(':ide', $ide);
  $req->bindParam(':idv', $idv);
  $req->bindParam(':DateD', $DateD);
  $req->bindParam(':DateF', $DateF);
  $req->execute(); */

}






?>
