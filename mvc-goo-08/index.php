<?php

require_once 'include/configuration.php';
Autoloader::chargerClasses();

session_start();

if (!isset($_SESSION['login'])) {
    $_REQUEST['gestion'] = 'authentification';
} elseif (!isset($_REQUEST['gestion'])) {
    $_REQUEST['gestion'] = 'accueil';
}

//var_dump($_REQUEST);
//var_dump($_SESSION);
//var_dump($_SESSION['panier']);


$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();

