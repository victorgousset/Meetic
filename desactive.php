<?php
session_start();

require "include/User.php";
require "include/Database.php";

$db = new Database();
$bdd = $db->getPDO();

$user = new User();

if(isset($_GET['status']))
{
    $id = $_SESSION['id'];
    $user->desactive($bdd,$id);
}

include "include/menu.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Desactiver son compte</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Desactivation du compte</h1>


<p>Vous etes sur le point de desactiver votre compte</p>

<a href="desactive.php?status=desactive"><button class="btn btn-danger">Desactiver</button></a>
<br><br>
<a href="profil.php"><button class="btn btn-success">Annuler la desactivation</button></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="include/menu.js"></script>
</body>
</html>