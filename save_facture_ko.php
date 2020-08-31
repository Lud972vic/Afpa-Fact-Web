<?php $title = "La facture n'est sauvegardée"; ?>

<?php ob_start(); ?>

    <div class="container col-6 mt-5">
        <h1>La facture n'est sauvegardée, le service technique est prévenu.</h1>
        <img src='/assets/img/probleme.jpg' class='img-fluid' alt='Update valid'>
        <a class="btn btn-outline-primary" href="create_facture.php">Créer une nouvelle facture</a>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('gabarit.php'); ?>
