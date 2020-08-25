<?php
session_start();

require "../include/Database.php";
require "../include/User_modification.php";

$db = new Database();
$bdd = $db->getPDO();

$user_modif = new User_modification($bdd);
$prenom = htmlspecialchars($_POST['prenom']);
$nom = htmlspecialchars($_POST['nom']);
$ddn = htmlspecialchars($_POST['date_naissance']);
$ville = htmlspecialchars($_POST['ville']);
$genre = htmlspecialchars($_POST['genre']);
$mail = htmlspecialchars($_POST['mail']);
$id_membre = $_SESSION['id'];

$user_modif->updateInfoPerso($prenom, $nom, $ddn, $ville, $genre, $mail, $id_membre);
