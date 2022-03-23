<?php

class AccueilVue
{
    private $parametres = [];

    public function __construct($parametres)
    {
        $this->parametres = $parametres;
        $titrePrincipal = "GOURMANDISE SARL";

        $accueil = "NEW ACCUEIL";
        require_once 'mod_accueil/vue/AccueilVue.tpl';
    }
}