<?php $title = 'La facture est sauvegardée'; ?>

<?php ob_start(); ?>

<div class="container mt-5">
    <div align="center">
        <h1>La facture est sauvegardée</h1>
        <img src='/assets/img/la_facture2.png' class='img-fluid mt-5' alt='Update valid'>
        <div class="btn-group mb-5 m-2" role="group" aria-label="Mes actions sur la facture">
            <a class="btn btn-outline-success pull-right mx-1" href="create_facture.php"><i
                        class="fas fa-cart-arrow-down"></i> Créer une nouvelle facture</a>
            <a class="btn btn-outline-primary pull-right" href="liste_facture.php"><i class="fas fa-list-ol"></i> Retour
                à la liste des factures</a>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('gabarit.php'); ?>
