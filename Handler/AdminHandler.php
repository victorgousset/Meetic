<?php

require '../include/Database.php';
require '../include/Admin.php';

$db = new Database();
$bdd = $db->getPDO();

$admin = new Admin($bdd);
$loisir = htmlspecialchars($_POST['loisir']);
$admin->setLoisir($loisir);
