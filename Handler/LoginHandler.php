<?php
session_start();

require "../include/Database.php";
require "../include/Login.php";

$db = new Database();
$bdd = $db->getPDO();

$login = new Login($bdd);
$login->getErrors();