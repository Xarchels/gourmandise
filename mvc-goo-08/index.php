<?php
session_start();

require_once 'include/configuration.php';
Autoloader::chargerClasses();

if (!isset($_SESSION['login'])) {
    $_REQUEST['gestion'] = 'authentification';
} elseif (!isset($_REQUEST['gestion'])) {
    $_REQUEST['gestion'] = 'accueil';
}

//Appel au routeur du module 'accueil'
//require_once 'mod_' . $_REQUEST['gestion'] . '/' . $_REQUEST['gestion'] . '.php';
var_dump($_REQUEST);
//var_dump($_SESSION);

$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();