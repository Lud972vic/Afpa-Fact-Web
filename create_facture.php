<?php
session_start();
$title = 'Création de factures';
?>

<?php ob_start();

/*Si pas de session utilisateur valide, on redirige celui-ci automatiquement sur la page index.php*/
if (!isset($_SESSION["id_membre"])) {
    header('Location: index.php');
}
?>

<h1 class="my-5"><i class="far fa-address-card"></i> Bienvenue <?= $_SESSION['pseudo'] ?></h1>

<form action="insert_facture.php" method="post" name="formInsertFacture" class="card form-group">
    <div class="card-header text-white badge-success text-center">
        <i class="fas fa-cart-arrow-down"></i> Créer une nouvelle facture
    </div>
    <div class="form-group">
        <label for="numtva"><i class="fas fa-percentage mx-2 my-2"></i> TVA</label>
        <input type="number" class="form-control" id="numtva" name="numtva" aria-describedby="numtvaHelp" value="20.6"
               required>
        <small id="numtvaHelp" class="form-text text-muted mx-2">Le taux de TVA</small>
    </div>
    <div class="form-group">
        <label for="client"><i class="fas fa-signature mx-2 my-2"></i> CLIENT</label>
        <input type="text" class="form-control" id="client" name="client" aria-describedby="clientHelp"
               value="Centre de formation AFPA"
               required>
        <small id="clientHelp" class="form-text text-muted mx-2">Information sur votre client</small>
    </div>
    <div class="form-group">
        <label for="mailclient"><i class="far fa-envelope mx-2 my-2"></i> E-MAIL</label>
        <input type="email" class="form-control" id="mailclient" name="mailclient" aria-describedby="mailclientHelp"
               value="serviceinformatique@afpa.com"
               required>
        <small id="mailclientHelp" class="form-text text-muted mx-2">E-mail du client</small>
    </div>
    <div class="form-group">
        <label for="datefacture"><i class="far fa-calendar-alt mx-2 my-2"></i> DATE</label>
        <input type="date" class="form-control" id="datefacture" name="datefacture" aria-describedby="datefactureHelp"
               required>
        <small id="datefactureHelp" class="form-text text-muted mx-2">Date de facturation</small>
    </div>
    <div class="form-group">
        <label for="facturede"><i class="fas fa-signature mx-2 my-2"></i> FACTURE DE</label>
        <input type="text" class="form-control" id="facturede" name="facturede" aria-describedby="facturedeHelp"
               value="Facture de matériels informatiques"
               required>
        <small id="facturedeHelp" class="form-text text-muted mx-2">Facture de...</small>
    </div>
    <div class="form-group">
        <label for="designation"><i class="fas fa-signature mx-2 my-2"></i> DESIGNATION</label>
        <input type="text" class="form-control" id="designation" name="designation" aria-describedby="designationHelp"
               value="PC Portable 15.6 Lenovo Legion 5Pi 15 - Full HD IPS, i7-10750H, RAM 16 Go, SSD 256 Go, GTX 1660 Ti 6 Go, Free-DOS"
               required>
        <small id="designationHelp" class="form-text text-muted mx-2">La désignation</small>
    </div>
    <div class="form-group">
        <label for="quantite"><i class="fas fa-sort-numeric-up mx-2 my-2"></i> QUANTITE</label>
        <input type="number" class="form-control" id="quantite" name="quantite" aria-describedby="quantiteHelp"
               value="15"
               required>
        <small id="quantiteHelp" class="form-text text-muted mx-2">La quantité</small>
    </div>
    <div class="form-group">
        <label for="prixht"><i class="fas fa-euro-sign mx-2 my-2"></i> PRIX HT</label>
        <input type="number" class="form-control" id="prixht" name="prixht" aria-describedby="prixhtHelp" value="14904"
               required>
        <small id="prixhtHelp" class="form-text text-muted mx-2">Le prix en HT</small>
    </div>
    <div class="form-group">
        <label for="taxe"><i class="fas fa-percentage mx-2 my-2"></i> TAXE</label>
        <input type="number" class="form-control" id="taxe" name="taxe" aria-describedby="taxeHelp" value="2980.8"
               required>
        <small id="taxeHelp" class="form-text text-muted mx-2">La taxe</small>
    </div>
    <div class="form-group">
        <label for="conditions"><i class="fas fa-signature mx-2 my-2"></i> CONDITIONS</label>
        <input type="text" class="form-control" id="conditions" name="conditions" aria-describedby="conditionsHelp"
               value="Paiement à la livraison"
               required>
        <small id="conditionsHelp" class="form-text text-muted mx-2">Les conditions</small>
    </div>

    <div class="form-group">
        <label for="id_membre"><i class="far fa-id-card mx-2 my-2"></i> ID Membre</label>
        <input type="text" class="form-control" id="id_membre" name="id_membre" aria-describedby="id_membreHelp"
               readonly="true" value="<?= $_SESSION['id_membre'] ?>" required>
        <small id="id_membreHelp" class="form-text text-success mx-2">Vous êtes connecté en tant
            que <?= $_SESSION['pseudo'] ?></small>
    </div>

    <div class="btn-group mb-5 m-2" role="group" aria-label="Mes actions sur la facture">
        <button type="submit" class="btn btn-outline-success mx-1"><i class="far fa-save"></i> Sauvegarder la facture
        </button>
        <a href="liste_facture.php" class="btn btn-outline-primary"><i class="fas fa-list-ol"></i> Annuler & Retour à la
            liste des factures</a>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('gabarit.php'); ?>
