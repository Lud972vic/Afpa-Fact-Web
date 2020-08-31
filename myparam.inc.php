<?php

//Information de la base de données
$host = "localhost";
$db_name = "bdd_factures";
$username = "root";
$password = "";

$db = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
