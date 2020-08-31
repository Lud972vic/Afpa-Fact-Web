<?php

session_start();
$title = 'Liste des factures';
include_once('myparam.inc.php');
ob_start();
?>

<h1><i class="fas fa-list-ol mt-5"></i> Liste des factures</h1>

<table class="master table table-sm table-striped">
    <thead>
    <tr>
        <th scope="col">PDF <i class="fas fa-print text"></i></th>
        <th scope="col">N° FACTURE</th>
        <th scope="col">TVA</th>
        <th scope="col">CLIENT</th>
        <th scope="col">E-MAIL</th>
        <th scope="col">DATE</th>
        <th scope="col">FACTURE DE</th>
        <th scope="col">DESIGNATION</th>
        <th scope="col">QUANTITE</th>
        <th scope="col">PRIX</th>
        <th scope="col">TAXE</th>
        <th scope="col">DESIGNATION</th>
    </tr>
    </thead>

    <tbody>
    <?php
    /*Valeurs du formulaire*/
    $lIdMembre = $_SESSION['id_membre'];

    /*Ma connexion*/
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);

    /*Ma requête*/
    $result = array();
    $sql = "SELECT num, numtva, client, mailclient, datefacture, facturede, designation, quantite, prixht, taxe, conditions, id_membre, num FROM facture WHERE id_membre= :lIdMembre ORDER BY num desc";
    $query = $db->prepare($sql);
    $query->bindValue(':lIdMembre', $lIdMembre);
    $query->execute();

    foreach ($query as $e) {
        $details = [];
        $details[] = $e[0];
        $details[] = $e[1];
        $details[] = $e[2];
        $details[] = $e[3];
        $details[] = $e[4];
        $details[] = $e[5];
        $details[] = $e[6];
        $details[] = $e[7];
        $details[] = $e[8];
        $details[] = $e[9];
        $details[] = $e[10];

        echo '<tr>';
        echo '<td><a href="details_facture.php/?' . http_build_query(array('p' => $details)) . '" type="button" class="btn btn-outline-warning"><i class="far fa-file-pdf"></i></a></td>';
        echo '<td>' . $e[0] . '</td>';
        echo '<td>' . $e[1] . '</td>';
        echo '<td>' . $e[2] . '</td>';
        echo '<td>' . $e[3] . '</td>';
        echo '<td>' . $e[4] . '</td>';
        echo '<td>' . $e[5] . '</td>';
        echo '<td>' . $e[6] . '</td>';
        echo '<td>' . $e[7] . '</td>';
        echo '<td>' . $e[8] . '</td>';
        echo '<td>' . $e[9] . '</td>';
        echo '<td>' . $e[10] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>
<?php require('gabarit.php'); ?>
