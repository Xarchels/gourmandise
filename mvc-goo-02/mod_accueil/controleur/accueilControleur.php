<?php

class AccueilControleur
{
    private $parametre = [];
    //Ultérieurement un objet $oModele sera nécessaire
    private $oVue;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        require_once 'mod_accueil/vue/accueilVue.php';
        $this->oVue = new AccueilVue($this->parametre);
    }

}