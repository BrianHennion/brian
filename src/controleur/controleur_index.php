<?php

function actionAccueil($twig){
    echo $twig->render('index.html.twig', array());
}

function actionConnexion($twig){
    echo $twig->render('connexion.html.twig', array()); 
}

function actionInscrire($twig){
    $form = array(); 
    if (isset($_POST['btInscrire'])){
      $inputEmail = $_POST['inputEmail'];
      $inputPassword = $_POST['inputPassword']; 
      $inputPassword2 =$_POST['inputPassword2']; 
      $role = $_POST['role'];
      $form['valide'] = true;
      if ($inputPassword!=$inputPassword2){
        $form['valide'] = false;  
        $form['message'] = 'Les mots de passe sont différents';
      }
      
      $form['email'] = $inputEmail;
      $form['role'] = $role;
      
    }
    echo $twig->render('inscrire.html.twig', array('form'=>$form));
}

function actionMentions($twig){
    echo $twig->render('mentions.html.twig', array());
}

function actionApropos($twig){
    echo $twig->render('apropos.html.twig', array());
}

function actionMaintenance($twig){
    echo $twig->render('maintenance.html.twig', array());
}

function actionAjouterUtilisateur($twig,$db){
    $form = array();
    $utilisateur = new Utilisateur($db);
    $form['valide'] = false;
    if (isset($_POST['btAjouter'])){
        $inputNom = $_POST['nom'];
        $inputPrenom = $_POST['prenom'];
        $inputAdresse = $_POST['adresse'];
        $inputCP = $_POST['cp'];
        $inputVille = $_POST['ville'];
        $form['valide'] = true;
        $utilisateur->insert($inputNom, $inputPrenom, $inputAdresse, $inputCP, $inputVille);
    }
    echo $twig->render('ajouterUtilisateur.html.twig', array('form'=>$form));
}
?>
