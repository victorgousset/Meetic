<?php

require "../include/Database.php";
require "../include/Register.php";

$db = new Database();
$bdd = $db->getPDO();

$register = new Register($bdd);
$register->getErros();