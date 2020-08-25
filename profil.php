<?php
session_start();

require "include/User.php";
require "include/Database.php";
require 'include/Errors.php';

$db = new Database();
$bdd = $db->getPDO();

$error = new Errors();

$user = new User();
$id = $_SESSION['id'];
$user->isActivate($bdd,$id);

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

<h1>Bienvenu(e) <?php $user->getPrenom(); ?></h1>

<br><br>

<div class="profil_info">
    <div class="card border-primary profil_info_text">
        <?php $user->getProfil(); ?>
        <img src="../logo/<?= $_SESSION['photo'] ?>" alt="Photo de profil" width="200">
    </div>
    <br><br>
    <a href="modification_profil.php"><button class="btn btn-primary">Modifier mon profil</button></a>
    <a href="logout.php"><button class="btn btn-warning">Se deconnecter</button></a><br><br>
    <a href="desactive.php"><button class="btn btn-outline-danger">Desactiver mon compte</button></a>
    <?php if ($user->btn_admin($bdd, $_SESSION['id']) == true) { ?>
        <a href="admin/index.php"><button class="btn btn-success">Administration</button></a>
    <?php } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="include/menu.js"></script>
</body>
</html>
