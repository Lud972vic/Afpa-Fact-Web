<?php
session_start();

$title = 'Connectez-vous !';
ob_start();

/*On sauvegarde les valeurs inputs, pour éviter de les ressaisir à nouveau*/
if (isset($_POST['login'])) {
    $lePseudo = $_POST['login'];
} else {
    $lePseudo = null;
}

if (isset($_POST['password'])) {
    $lePassword = $_POST['password'];
} else {
    $lePassword = null;
}
?>

<h1 class="my-5"><i class="fas fa-sign-in-alt"></i> Connectez-vous !</h1>

<form action="#" method="post">
    <div class="form-group">
        <label for="login"><i class="far fa-user"></i> Pseudo</label>
        <input type="text" class="form-control" id="login" name="login" value="<?php echo $lePseudo; ?>" required>
    </div>
    <div class="form-group">
        <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $lePassword; ?>"
               required>
    </div>
    <button type="submit" name="SubmitButton" class="btn btn-primary"><i class="fas fa-user-check"></i> Valider</button>
</form>

<?php
if (!empty($_POST['login']) && !empty($_POST['password'])) {
    include_once('myparam.inc.php');

    /*Valeurs du formulaire*/
    $lePseudo = $_POST['login'];
    $lePassword = $_POST['password'];

    /*Ma connexion*/
    $cnx = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);

    /*Ma requête*/
    $result = array();
    $sql = "SELECT id_membre, pseudo, password FROM membres WHERE pseudo= :lePseudo";
    $query = $cnx->prepare($sql);
    $query->bindValue(':lePseudo', $lePseudo);
    $query->execute();

    /*On vérifié le résultat de la reqûete*/
    while ($data = $query->fetch()) {
        $result[] = $data;
    }

    /*On vérifie le mot de passe*/
    if (isset($result[0][2])) {
        $pwdIsValid = password_verify($lePassword, $result[0][2]);
    } else {
        echo '<p class="text-danger text-center">Votre pseudo n\'existe pas dans les contacts.</p>';
    }

    /*On récupère l'id de l'utilisateur et on le passe en variable de SESSION*/
    if (!empty($result[0][0]) && $pwdIsValid) {
        $_SESSION['id_membre'] = $result[0][0];
        $_SESSION['pseudo'] = $result[0][1];

        //On redirigé l'utilisateur vers la page facture, une fois connecté
        header('Location: create_facture.php');
    } else {
        echo '<p class="text-danger text-center">Veuillez vérifier votre pseudo et mot de passe.</p>';
    }
}

$content = ob_get_clean();
require('gabarit.php');
?>
