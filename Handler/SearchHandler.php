<?php

require "../include/Database.php";
require "../include/Search.php";

$db = new Database();
$bdd = $db->getPDO();

$search = new Search($bdd);
$search->getResult();