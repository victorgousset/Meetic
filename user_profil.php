<?php
session_start();

require "include/User.php";
require "include/Database.php";

$db = new Database();
$bdd = $db->getPDO();

$user = new User();

include "include/menu.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<br><br>

<div class="card border-primary info_user">
    <?php $user->getInfoUser($bdd); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="include/menu.js"></script>
</body>
</html>