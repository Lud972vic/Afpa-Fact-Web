<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= $title ?></title>
</head>
<?php require_once('nav.php') ?>
<body>
<div class="container-fluid mt-1 mb-5">
    <?= $content ?>
</div>
</body>
<?php require_once('footer.html') ?>
</html>
