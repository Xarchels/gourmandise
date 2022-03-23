<?php
require_once 'include/configuration.php';

if (!isset($_REQUEST['gestion'])) {
    $_REQUEST['gestion'] = 'accueil';
}

//Appel au routeur du module 'accueil'
require_once 'mod_' . $_REQUEST['gestion'] . '/' . $_REQUEST['gestion'] . '.php';

$oRouteur = new $_REQUEST['gestion']($_REQUEST);