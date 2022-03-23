<?php

//Role de routeur

class Accueil
{
    private $parametre = [];
    private $oControleur;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        require_once 'mod_accueil/controleur/accueilControleur.php';
        $this->oControleur = new AccueilControleur($this->parametre);
    }
}