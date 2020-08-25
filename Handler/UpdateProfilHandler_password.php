<?php
session_start();

require "../include/Database.php";
require "../include/User_modification.php";

$db = new Database();
$bdd = $db->getPDO();

$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$id_membre = $_SESSION['id'];

$passwordUpdate = new User_modification($bdd);
$passwordUpdate->updatePassword($password, $password_confirm, $id_membre);