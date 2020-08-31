<?php

/*On vérifie que tous les champs du formulaire sont renseignés, si un champs vide on met la variable $formValid à true*/
foreach ($_POST as $cle => $valeur) {
    if (empty($_POST[$cle])) {
        $formValid = true;
    } else {
        $formValid = false;
    }
}

if ($formValid) {
    echo "Veuillez remplir tous les champs du formulaire !";
} else {
    try {
        /*Parametre connexion et connexion*/
        include_once('myparam.inc.php');

        /*Données du formulaire*/
        $num = uniqid(); //'FactNum_5f3cae613c424';
        $numtva = $_POST['numtva'];
        $client = $_POST['client'];
        $mailclient = $_POST['mailclient'];
        $datefacture = $_POST['datefacture'];
        $facturede = $_POST['facturede'];
        $designation = $_POST['designation'];
        $quantite = $_POST['quantite'];
        $prixht = $_POST['prixht'];
        $taxe = $_POST['taxe'];
        $conditions = $_POST['conditions'];
        $id_membre = $_POST['id_membre'];

        /*Ma requête insert into*/
        $sql = "INSERT INTO facture 
                (num, numtva, client, mailclient, datefacture, facturede, designation, quantite, prixht, taxe, conditions, id_membre) 
            VALUES 
                ('$num', '$numtva', '$client', '$mailclient', '$datefacture', '$facturede', '$designation', '$quantite', '$prixht', '$taxe', '$conditions', '$id_membre')
            ";
        $query = $db->prepare($sql);
        $query->execute();

        header('Location: save_facture_ok.php');
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        header('Location: save_facture_ko.php');
    }
    //Fermer la connexion au serveur
    $db->close();
};
