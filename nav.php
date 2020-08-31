<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/fontawesome.all.min.js"></script>

<style>
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #555 !important;
        color: white;
        text-align: center;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="assets/img/Ludo@Petit.png" class="rounded float-right" alt="Lud972vic" style="width: 100px">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="create_facture.php">Fact<i class="fas fa-euro-sign"></i>Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown"><a
                            class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Menu</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <!--Menu dynamique-->
                        <?php
                        if (!isset($_SESSION['isAdmin'])) { ?>
                            <form action="sign_in.php" method="post">
                                <label class="mx-2"><i class="fas fa-user-shield"></i> Admin - Création de compte
                                    utilisateur</label>
                                <input type="password" name="pwd">
                                <input type="submit" class="btn-sm btn-outline-primary" value="Valider">
                            </form>
                            <?php
                        } else {
                            echo '<a class="dropdown-item" href="sign_in.php"><i class="fas fa-user-shield"></i> Admin - Création de compte utilisateur</a>';
                            echo '<a class="dropdown-item" href="sign_out.php"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>';
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['pseudo'])) {
                            echo '<a class="dropdown-item" href="create_facture.php"><i class="fas fa-cart-arrow-down"></i> Créer une facture</a>';
                            echo '<a class="dropdown-item" href="liste_facture.php"><i class="fas fa-list-ol"></i> Liste des factures</a>';
                            echo '<hr>';
                            echo '<a class="dropdown-item" href="sign_out.php"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>';
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
        </li>
        </ul>
        </div>
    </nav>
</nav>
