<?php

include_once('functions/Email.php');

$title = 'Création des comptes utilisateurs';
ob_start();
session_start();

/*Vérification mot de passse admin*/
if (!isset($_SESSION['lePWD'])) {
    $_SESSION['lePWD'] = $_POST['pwd'];
    $pwdIsValid = password_verify($_SESSION['lePWD'], '$2y$10$UeI/ds7Gx2uMgv7V9hxHoe4ycORlscmqHz9JkWeDlaLQBRNiUZiNq');
} else {
    $pwdIsValid = password_verify($_SESSION['lePWD'], '$2y$10$UeI/ds7Gx2uMgv7V9hxHoe4ycORlscmqHz9JkWeDlaLQBRNiUZiNq');
    if (!$pwdIsValid) {
        session_unset();
        session_destroy();
    }
}

if ($pwdIsValid) {
    $_SESSION['isAdmin'] = true;
    ?>

    <h1 align="center" class="mt-5"><i class="fas fa-user-shield"></i> Administrateur de l'application</h1>
    <p align="center">Création des comptes utilisateurs</p>
    <form action="" method="post">
        <div class="form-group mt-5">
            <label for="email"><i class="fas fa-at"></i> Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                   placeholder="Entrer son email"
                   value="" required>
            <small id=" emailHelp" class="form-text text-muted">Son adresse email</small>
        </div>
        <div class="form-group">
            <label for="pseudo"><i class="fas fa-signature"></i> Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudoHelp"
                   placeholder="Entrer son pseudo"
                   value="" required>
            <small id="pseudoHelp" class="form-text text-muted">Son pseudo</small>
        </div>
        <div class="form-group">
            <label for="inputPassword1"><i class="fas fa-lock"></i> Mot de passe</label>
            <input type="password" class="form-control" id="inputPassword1" name="inputPassword1"
                   aria-describedby="passwordHelp"
                   placeholder="Entrer son mot de passe"
                   value="" required>
            <small id="passwordHelp" class="form-text text-muted">Saisir son mot de passe</small>
        </div>
        <div class="form-group">
            <label for="inputPassword2"><i class="fas fa-lock"></i> Vérification mot de passe</label>
            <input type="password" class="form-control" id="inputPassword2" name="inputPassword2"
                   aria-describedby="password2Help"
                   placeholder="Entrer son mot de passe"
                   value="" required>
            <small id="password2Help" class="form-text text-muted">Saisir son mot de passe</small>
        </div>

        <button type="submit" name="SubmitButton" class="btn btn-outline-primary mt-2"><i class="fas fa-user-check"></i>
            Valider
        </button>
        <a href="index.php" class="btn btn-outline-primary mt-2"><i class="fas fa-times"></i> Annuler</a>
    </form>

    <?php
    $content = ob_get_clean();
    require('gabarit.php');

} else {
    $_SESSION['isAdmin'] = false;
    session_unset();
    session_destroy();

    $content = ob_get_clean();
    require('gabarit.php');
    echo '<h1 align="center" class="mt-5 text-danger"><i class="fas fa-user-shield"></i> <br><br>Accès réservé à l\'administrateur de l\'application</h1>';
    echo '<p class="text-center"><img src="assets/img/accesinterdit.jpg"></p>';
    echo '<p class="text-center"><a href="index.php" class="btn btn-outline-primary"><i class="fas fa-home"></i> Accueil</a></p>';
}
?>

<?php
if (isset($_POST['SubmitButton'])) {
    /*Total élément sur le formulaire*/
    $checkInputTotal = 4;
    /*Total élément renseigné sur le formulaire*/
    $checkInput = 0;

    /*On vérifie que tous les champs du formulaire sont renseignés, si $checkInputTotal==$checkInput Ok, sinon Ko*/
    foreach ($_POST as $cle => $valeur) {
        if ($valeur != null) {
            $checkInput += 1;
        }
        $checkInputOkOrKo = $checkInput === $checkInputTotal;
    }

    /*Si tous les inputs sont renseignés*/
    if ($checkInputOkOrKo) {
        /*Les mots de passes sont identiques*/
        if ($_POST['inputPassword1'] === $_POST['inputPassword2']) {
            /*Valeurs du formulaire*/
            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $pwd = password_hash($_POST['inputPassword1'], PASSWORD_BCRYPT);

            /*Parametre connexion et connexion*/
            include_once('myparam.inc.php');

            /*Vérification utilisateur existant*/
            $sql = "SELECT COUNT(*) FROM membres WHERE Email= :Email";
            $query = $db->prepare($sql);
            $query->bindValue(':Email', $email, PDO::PARAM_STR);
            $query->execute();

            /*Vérification que l'email n existe pas*/
            while ($data = $query->fetch()) {
                $result[] = $data;
            }

            if (!$result[0][0]) {
                //Envois email au nouveau utilisateur
                $newEmail = new Email();
                $newEmail->envoisMail($email, $pseudo, $_POST['inputPassword1']);

                /*Ma requête insert into*/
                $sql = "INSERT INTO membres (Email, pseudo, password) VALUES ('$email', '$pseudo', '$pwd')";
                $query = $db->prepare($sql);
                $query->execute();
                echo '<p class="text-danger text-center">L\'utilisateur est inscrit avec succès !</p>';
            } else {
                echo '<p class="text-danger text-center">L\'email existe déjà, veuillez vous rapprocher de votre utilisateur !</p>';
            }
        } else {
            echo '<p class="text-danger text-center">Les mots de passes sont différents !</p>';
        }
    } else {
        echo '<p class="text-danger text-center">Veuillez remplir tous les champs du formulaire correctement !</p>';
    }
}
?>
