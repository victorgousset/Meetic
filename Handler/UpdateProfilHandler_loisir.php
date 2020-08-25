<?php
session_start();

require "../include/Database.php";
require "../include/User_modification.php";

$db = new Database();
$bdd = $db->getPDO();

$array = $_POST['loisir'];
$id_membre = $_SESSION['id'];

$loisir = new User_modification($bdd);
$loisir->updateLoisir($array, $id_membre);